<?php

namespace App\Repositories;

use App\Http\Requests\RoleRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Repositories\Interfaces\IRoleRepository;
use Spatie\Permission\Models\Role;

class RoleRepository implements IRoleRepository
{
    public function index()
    {
        return Role::with('permissions')->get();
    }

    public function store(RoleRequest $request)
    {
        $data = $request->validated();

        $role = Role::create([
            'name' => $data['name'],
            'guard_name' => 'web'
        ]);

        isset($data['permissions']) ? $role->syncPermissions($data['permissions']) : '';

        return response([
            'message' => 'Role has created'
        ], 200);
    }

    public function show(Role $role)
    {
        return $role;
    }

    public function update(RoleUpdateRequest $request, Role $role)
    {
        $data = $request->validated();

        isset($data['name']) ? $role->update(['name' => $data['name']]) : '';

        isset($data['permissions']) ? $role->syncPermissions($data['permissions']) : '';

        return response([
            'message' => 'Role has been updated'
        ], 200);
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return response([
            'message' => 'role has been deleted'
        ], 200);
    }
}
