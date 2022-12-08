<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\RoleRequest;
use App\Http\Requests\RoleUpdateRequest;
use Spatie\Permission\Models\Role;

interface IRoleRepository
{
    public function index();

    public function store(RoleRequest $request);

    public function show(Role $role);

    public function update(RoleUpdateRequest $request, Role $role);

    public function destroy(Role $role);
}
