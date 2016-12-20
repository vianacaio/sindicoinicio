<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MyModel2CreateRequest;
use App\Http\Requests\MyModel2UpdateRequest;
use App\Repositories\MyModel2Repository;
use App\Validators\MyModel2Validator;


class MyModel2sController extends Controller
{

    /**
     * @var MyModel2Repository
     */
    protected $repository;

    /**
     * @var MyModel2Validator
     */
    protected $validator;

    public function __construct(MyModel2Repository $repository, MyModel2Validator $validator)
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
        $myModel2s = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $myModel2s,
            ]);
        }

        return view('myModel2s.index', compact('myModel2s'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MyModel2CreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(MyModel2CreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $myModel2 = $this->repository->create($request->all());

            $response = [
                'message' => 'MyModel2 created.',
                'data'    => $myModel2->toArray(),
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
        $myModel2 = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $myModel2,
            ]);
        }

        return view('myModel2s.show', compact('myModel2'));
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

        $myModel2 = $this->repository->find($id);

        return view('myModel2s.edit', compact('myModel2'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  MyModel2UpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(MyModel2UpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $myModel2 = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'MyModel2 updated.',
                'data'    => $myModel2->toArray(),
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
                'message' => 'MyModel2 deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'MyModel2 deleted.');
    }
}
