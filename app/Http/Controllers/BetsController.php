<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BetCreateRequest;
use App\Http\Requests\BetUpdateRequest;
use App\Repositories\BetRepository;
use App\Validators\BetValidator;

/**
 * Class BetsController.
 *
 * @package namespace App\Http\Controllers;
 */
class BetsController extends Controller
{
    /**
     * @var BetRepository
     */
    protected $repository;

    /**
     * @var BetValidator
     */
    protected $validator;

    /**
     * BetsController constructor.
     *
     * @param BetRepository $repository
     * @param BetValidator $validator
     */
    public function __construct(BetRepository $repository, BetValidator $validator)
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
        $bets = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $bets,
            ]);
        }

        return view('bets.index', compact('bets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BetCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BetCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $bet = $this->repository->create($request->all());

            $response = [
                'message' => 'Bet created.',
                'data'    => $bet->toArray(),
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
        $bet = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $bet,
            ]);
        }

        return view('bets.show', compact('bet'));
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
        $bet = $this->repository->find($id);

        return view('bets.edit', compact('bet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BetUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BetUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $bet = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Bet updated.',
                'data'    => $bet->toArray(),
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
                'message' => 'Bet deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Bet deleted.');
    }
}
