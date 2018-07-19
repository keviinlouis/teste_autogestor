<?php
/**
 * Criado através de FileTemplate por Kevin.
 */

/**
 * Created by PhpStorm.
 * User: Louis
 * Date: 18/07/2018
 * Time: 23:04
 */

namespace App\Http\Controllers\Admin;

use App\Http\Resources\AdminResource;
use App\Services\AdminService;
use App\Http\Requests\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    private $adminService;

    /**
     * AdminController constructor.
     * @param AdminService $adminService
     */
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AdminResource
     * @throws \Exception
     */
    public function index(Request $request): AdminResource
    {

        $model = $this->adminService->index($request->toCollection());

        return new AdminResource($model);
    }


    /** Login Method
     * @param Request $request
     * @return AdminResource
     * @throws \Exception
     * @throws \Throwable
     */
    public function login(Request $request): AdminResource
    {
        $model = $this->adminService->login($request->toCollection());

        return new AdminResource($model, true);
    }

    /**
     * Display the specified resource.
     *
     * @return AdminResource
     */
    public function me(): AdminResource
    {
        $model = $this->adminService->show(auth()->id());

        return new AdminResource($model);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return AdminResource
     * @throws \Exception
     * @throws \Throwable
     */
    public function store(Request $request): AdminResource
    {
        $model = $this->adminService->store($request->toCollection());

        return new AdminResource($model, true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return AdminResource
     */
    public function show(int $id): AdminResource
    {
        $model = $this->adminService->show($id);

        return new AdminResource($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return AdminResource
     * @throws \Exception
     */
    public function update(Request $request): AdminResource
    {
        $model = $this->adminService->update($request->toCollection(), auth()->id());

        return new AdminResource($model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return AdminResource
     * @throws \Exception
     */
    public function destroy(): AdminResource
    {
        $model = $this->adminService->delete(auth()->id());

        return new AdminResource($model);
    }

}
