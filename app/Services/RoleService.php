<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
    public function store(array $data): Role
    {
        $role = Role::create($data);

        return $role ?: null;
    }

    public function update(array $data, $role): Role
    {
        return $role->update($data) ? $role : null;
    }

    public function destroy($role): Role
    {
        return $role->delete() ? $role : null;
    }
}