<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\PermissionRequest;
use App\Http\Requests\PermissionUpdateRequest;
use Spatie\Permission\Models\Permission;

interface IPermissionRepository
{
    public function index();

    public function store(PermissionRequest $request);

    public function show(Permission $permission);

    public function update(PermissionUpdateRequest $request, Permission $permission);

    public function destroy(Permission $permission);
}
