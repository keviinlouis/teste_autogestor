<?php
/**
 * Criado através de FileTemplate por Kevin.
 */

/**
 * Created by PhpStorm.
 * User: Louis
 * Date: 18/07/2018
 * Time: 23:07
 */

namespace App\Http\Controllers\Usuario;

use App\Http\Resources\UsuarioResource;
use App\Services\UsuarioService;
use App\Http\Requests\Request;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    private $usuarioService;

    /**
     * UsuarioController constructor.
     * @param UsuarioService $usuarioService
     */
    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return UsuarioResource
     * @throws \Exception
     */
    public function index(Request $request): UsuarioResource
    {

        $model = $this->usuarioService->index($request->toCollection());

        return new UsuarioResource($model);
    }


    /** Login Method
     * @param Request $request
     * @return UsuarioResource
     * @throws \Exception
     * @throws \Throwable
     */
    public function login(Request $request): UsuarioResource
    {
        $model = $this->usuarioService->login($request->toCollection());

        return new UsuarioResource($model, true);
    }

    /**
     * Display the specified resource.
     *
     * @return UsuarioResource
     */
    public function me(): UsuarioResource
    {
        $model = $this->usuarioService->show(auth()->id());

        return new UsuarioResource($model);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return UsuarioResource
     * @throws \Exception
     * @throws \Throwable
     */
    public function store(Request $request): UsuarioResource
    {
        $model = $this->usuarioService->store($request->toCollection());

        return new UsuarioResource($model, true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return UsuarioResource
     */
    public function show(int $id): UsuarioResource
    {
        $model = $this->usuarioService->show($id);

        return new UsuarioResource($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return UsuarioResource
     * @throws \Exception
     */
    public function update(Request $request): UsuarioResource
    {
        $model = $this->usuarioService->update($request->toCollection(), auth()->id());

        return new UsuarioResource($model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return UsuarioResource
     * @throws \Exception
     */
    public function destroy(): UsuarioResource
    {
        $model = $this->usuarioService->delete(auth()->id());

        return new UsuarioResource($model);
    }

}
