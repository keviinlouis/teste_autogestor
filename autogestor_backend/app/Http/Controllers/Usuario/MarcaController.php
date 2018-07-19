<?php
/**
 * Criado através de FileTemplate por Kevin.
 */

/**
 * Created by PhpStorm.
 * User: Louis
 * Date: 18/07/2018
 * Time: 23:31
 */

namespace App\Http\Controllers\Usuario;

use App\Http\Resources\MarcaResource;
use App\Services\MarcaService;
use App\Http\Requests\Request;
use App\Http\Controllers\Controller;

class MarcaController extends Controller
{
    private $marcaService;

    /**
     * MarcaController constructor.
     * @param MarcaService $marcaService
     */
    public function __construct(MarcaService $marcaService)
    {
        $this->marcaService = $marcaService;
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return MarcaResource
     * @throws \Exception
     */
    public function index(Request $request): MarcaResource
    {

        $model = $this->marcaService->index($request->toCollection());

        return new MarcaResource($model);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return MarcaResource
     * @throws \Exception
     * @throws \Throwable
     */
    public function store(Request $request): MarcaResource
    {
        $model = $this->marcaService->store($request->toCollection());

        return new MarcaResource($model);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return MarcaResource
     */
    public function show(int $id): MarcaResource
    {
        $model = $this->marcaService->show($id);

        return new MarcaResource($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return MarcaResource
     * @throws \Exception
     */
    public function update(Request $request, int $id): MarcaResource
    {
        $model = $this->marcaService->update($request->toCollection(), $id);

        return new MarcaResource($model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return MarcaResource
     * @throws \Exception
     */
    public function destroy(int $id): MarcaResource
    {
        $model = $this->marcaService->delete($id);

        return new MarcaResource($model);
    }
}
