<?php

namespace App\Repositories;

use App\Http\Requests\PermissionRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Repositories\Interfaces\IPermissionRepository;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements IPermissionRepository
{
    public function index()
    {
        return Permission::with('roles')->get();
    }

    public function store(PermissionRequest $request)
    {

        $data = $request->validated();

        $permission = Permission::create([
            'name' => $data['name'],
            'guard_name' => 'web'
        ]);

        isset($data['roles']) ? $permission->syncRoles($data['roles']) : '';

        return response([
            'message' => 'Permission has created'
        ], 200);
    }

    public function show(Permission $permission)
    {
        return $permission;
    }

    public function update(PermissionUpdateRequest $request, Permission $permission)
    {
        $data = $request->validated();

        isset($data['name']) ? $permission->update(['name' => $data['name']]) : '';

        isset($data['roles']) ? $permission->syncRoles($data['roles']) : '';

        return response([
            'message' => 'Permission has been updated'
        ], 200);
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return response([
            'message' => 'Permission has been deleted'
        ], 200);
    }
}
