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

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $apartamentos = $this->repository->all();




        return $apartamentos;
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


            $apartamento = $this->repository->create($request->all());
            return response()->json($apartamento->toArray(), 201);






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



            return response()->json($apartamento->toArray());



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



            $apartamento = $this->repository->update($request->all(), $id);
             return response()->json($apartamento->toArray(), 201);


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
        $this->repository->delete($id);



        return response()->json([], 204);
    }
}
