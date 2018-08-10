<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PointLogCreateRequest;
use App\Http\Requests\PointLogUpdateRequest;
use App\Repositories\PointLogRepository;
use App\Validators\PointLogValidator;

/**
 * Class PointLogsController.
 *
 * @package namespace App\Http\Controllers;
 */
class PointLogsController extends Controller
{
    /**
     * @var PointLogRepository
     */
    protected $repository;

    /**
     * @var PointLogValidator
     */
    protected $validator;

    /**
     * PointLogsController constructor.
     *
     * @param PointLogRepository $repository
     * @param PointLogValidator $validator
     */
    public function __construct(PointLogRepository $repository, PointLogValidator $validator)
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
        $pointLogs = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $pointLogs,
            ]);
        }

        return view('pointLogs.index', compact('pointLogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PointLogCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PointLogCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $pointLog = $this->repository->create($request->all());

            $response = [
                'message' => 'PointLog created.',
                'data'    => $pointLog->toArray(),
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
        $pointLog = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $pointLog,
            ]);
        }

        return view('pointLogs.show', compact('pointLog'));
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
        $pointLog = $this->repository->find($id);

        return view('pointLogs.edit', compact('pointLog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PointLogUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PointLogUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $pointLog = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'PointLog updated.',
                'data'    => $pointLog->toArray(),
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
                'message' => 'PointLog deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'PointLog deleted.');
    }
}
