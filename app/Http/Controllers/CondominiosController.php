<?php

namespace App\Http\Controllers;




use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CondominioCreateRequest;
use App\Http\Requests\CondominioUpdateRequest;
use App\Repositories\CondominioRepository;



class CondominiosController extends Controller
{

    /**
     * @var CondominioRepository
     */
    protected $repository;

   

    public function __construct(CondominioRepository $repository)
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
        // $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $condominios = $this->repository->paginate();

        // if (request()->wantsJson()) {

        //     return response()->json([
        //         'data' => $condominios,
        //     ]);
        // }

        return view('admin.condominios.index', compact('condominios'));
    }


    public function create() {

        return view('admin.condominios.create');

    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  CondominioCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CondominioCreateRequest $request)
    {

       

            
            $this->repository->create($request->all());

            

            // if ($request->wantsJson()) {

            //     $response = [
            //     'message' => 'Condominio created.',
            //     'data'    => $condominio->toArray(),
            // ];

            //     return response()->json($response);
            // }

            return redirect()->route('condominios.index');
         
            
            
        
        }



    


    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int $id
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     $condominio = $this->repository->find($id);

    //     if (request()->wantsJson()) {

    //         return response()->json([
    //             'data' => $condominio,
    //         ]);
    //     }

    //     return view('condominios.show', compact('condominio'));
    // }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $condominio = $this->repository->find($id);

        return view('admin.condominios.edit', compact('condominio'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CondominioUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CondominioUpdateRequest $request, $id)
    {

        

            $this->repository->update($request->all(), $id);

            

            // if ($request->wantsJson()) {

            //     $response = [
            //     'message' => 'Condominio updated.',
            //     'data'    => $condominio->toArray(),
            // ];

            //     return response()->json($response);
            // }

            return redirect()->route('condominios.index');
        
           
        
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
                'message' => 'Condominio deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Condominio deleted.');
    }
}
