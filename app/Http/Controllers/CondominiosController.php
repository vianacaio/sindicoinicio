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
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $condominio = $this->repository->create($request->all());
            $response = [
                'message' => 'Condominio created.',
                'data'    => $condominio->toArray(),
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
        return view('condominios.edit', compact('condominio'));
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
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $condominio = $this->repository->update($id, $request->all());
            $response = [
                'message' => 'Condominio updated.',
                'data'    => $condominio->toArray(),
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
                'message' => 'Condominio deleted.',
                'deleted' => $deleted,
            ]);
        }
        return redirect()->back()->with('message', 'Condominio deleted.');
    }
}