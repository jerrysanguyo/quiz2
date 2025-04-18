<?php

namespace App\Services;

use App\Models\Permission;

class PermissionService
{
    public function store(array $data): Permission
    {
        $permission = Permission::create($data);

        return $permission ?: null;
    }

    public function update(array $data, $permission): Permission
    {
        return $permission->update($data) ? $permission : null;
    }

    public function destroy($permission): Permission
    {
        return $permission->delete() ? $permission : null;
    }
}