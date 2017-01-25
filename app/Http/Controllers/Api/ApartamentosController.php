<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ApartamentoCreateRequest;
use App\Http\Requests\ApartamentoUpdateRequest;
use App\Repositories\ApartamentoRepository;



class ApartamentosController extends Controller
{

    /**
     * @var ApartamentoRepository
     */
    protected $repository;


    public function __construct(ApartamentoRepository $repository)
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
        
        $apartamentos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $apartamentos,
            ]);
        }

        return view('apartamentos.index', compact('apartamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ApartamentoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ApartamentoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $apartamento = $this->repository->create($request->all());

            $response = [
                'message' => 'Apartamento created.',
                'data'    => $apartamento->toArray(),
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
        $apartamento = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $apartamento,
            ]);
        }

        return view('apartamentos.show', compact('apartamento'));
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

        $apartamento = $this->repository->find($id);

        return view('apartamentos.edit', compact('apartamento'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ApartamentoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ApartamentoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $apartamento = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Apartamento updated.',
                'data'    => $apartamento->toArray(),
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
                'message' => 'Apartamento deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Apartamento deleted.');
    }
}
