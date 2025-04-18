<?php

namespace App\Services;

use App\Models\User;

class UserService 
{
    public function store(array $data): User
    {
        $user = User::create($data);

        return $user ?: null;
    }

    public function update(array $data, $user): User
    {
        return $user->update($data) ? $user : null;
    }

    public function destroy($user): User
    {
        return $user->delete() ? $user : null;
    }
}