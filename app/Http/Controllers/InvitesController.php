<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\InviteCreateRequest;
use App\Http\Requests\InviteUpdateRequest;
use App\Repositories\InviteRepository;
use App\Validators\InviteValidator;

/**
 * Class InvitesController.
 *
 * @package namespace App\Http\Controllers;
 */
class InvitesController extends Controller
{
    /**
     * @var InviteRepository
     */
    protected $repository;

    /**
     * @var InviteValidator
     */
    protected $validator;

    /**
     * InvitesController constructor.
     *
     * @param InviteRepository $repository
     * @param InviteValidator $validator
     */
    public function __construct(InviteRepository $repository, InviteValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $invites = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $invites,
            ]);
        }

        return view('invites.index', compact('invites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  InviteCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(InviteCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $invite = $this->repository->create($request->all());

            $response = [
                'message' => 'Invite created.',
                'data'    => $invite->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invite = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $invite,
            ]);
        }

        return view('invites.show', compact('invite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invite = $this->repository->find($id);

        return view('invites.edit', compact('invite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  InviteUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(InviteUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $invite = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Invite updated.',
                'data'    => $invite->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Invite deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Invite deleted.');
    }
}
