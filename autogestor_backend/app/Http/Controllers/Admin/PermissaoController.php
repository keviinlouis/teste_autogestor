<?php
/**
 * Criado através de FileTemplate por Kevin.
 */

/**
 * Created by PhpStorm.
 * User: Louis
 * Date: 18/07/2018
 * Time: 23:29
 */

namespace App\Http\Controllers\Admin;

use App\Http\Resources\PermissaoResource;
use App\Services\PermissaoService;
use App\Http\Requests\Request;
use App\Http\Controllers\Controller;

class PermissaoController extends Controller
{
    private $permissaoService;

    /**
     * PermissaoController constructor.
     * @param PermissaoService $permissaoService
     */
    public function __construct(PermissaoService $permissaoService)
    {
        $this->permissaoService = $permissaoService;
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return PermissaoResource
     * @throws \Exception
     */
    public function index(Request $request): PermissaoResource
    {

        $model = $this->permissaoService->index($request->toCollection());

        return new PermissaoResource($model);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return PermissaoResource
     * @throws \Exception
     * @throws \Throwable
     */
    public function store(Request $request): PermissaoResource
    {
        $model = $this->permissaoService->store($request->toCollection());

        return new PermissaoResource($model);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return PermissaoResource
     */
    public function show(int $id): PermissaoResource
    {
        $model = $this->permissaoService->show($id);

        return new PermissaoResource($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return PermissaoResource
     * @throws \Exception
     */
    public function update(Request $request, int $id): PermissaoResource
    {
        $model = $this->permissaoService->update($request->toCollection(), $id);

        return new PermissaoResource($model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return PermissaoResource
     * @throws \Exception
     */
    public function destroy(int $id): PermissaoResource
    {
        $model = $this->permissaoService->delete($id);

        return new PermissaoResource($model);
    }
}
