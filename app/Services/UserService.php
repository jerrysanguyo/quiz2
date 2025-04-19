<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserDisability;

class UserService 
{
    public function store(array $data): User
    {
        $user = User::create([
            "first_name"=> $data["first_name"],
            "middle_name"=> $data["middle_name"],
            "last_name"=> $data["last_name"],
            "email"=> $data["email"],
            "password"=>  bcrypt($data["password"]),
        ]);

        if($user)
        {
            $disability = UserDisability::updateOrCreate([
                'user_id' => $user->id,
                'disability_id' => $data['disability_id'],
            ]);
        }

        if($user && $disability)
        {
            return $user ?: null;
        }
    }

    public function update(array $data, User $user): ?User
    {
        $updated = $user->update([
            "first_name"  => $data["first_name"],
            "middle_name" => $data["middle_name"],
            "last_name"   => $data["last_name"],
            "email"       => $data["email"],
            "password"    => isset($data["password"]) && $data["password"]
                ? bcrypt($data["password"])
                : $user->password,
        ]);
    
        if ($updated) {
            $disability = UserDisability::updateOrCreate(
                [
                    'user_id'       => $user->id,
                ],
                [
                    'disability_id' => $data['disability_id'],
                ]
            );
    
            return $user;
        }
    
        return null;
    }

    public function destroy($user): User
    {
        return $user->delete() ? $user : null;
    }
}