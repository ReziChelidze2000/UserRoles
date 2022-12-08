<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Repositories\Interfaces\IPermissionRepository;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct(IPermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return $this->permissionRepository->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        return $this->permissionRepository->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Permission
     */
    public function show(Permission $permission)
    {
        return $this->permissionRepository->show($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(PermissionUpdateRequest $request, Permission $permission)
    {
        return $this->permissionRepository->update($request, $permission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        return $this->permissionRepository->destroy($permission);
    }
}
