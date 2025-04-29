<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $superAdminRole = Role::firstOrCreate(['name' => 'superadmin']);
        $judgeRole = Role::firstOrCreate(['name' => 'admin']);

        $admin = User::firstOrCreate(
            ['email' => 'jsanguyo1624@gmail.com'],
            [
                'first_name'     => 'Jerry',
                'middle_name'    => 'Gonzaga',
                'last_name'      => 'Sanguyo',
                'password'       => bcrypt('password'),
            ]
        );

        $judges = [
            [
                'email'         => 'judge1@gmail.com',
                'first_name'    => 'Judge1',
                'middle_name'   => ' ',
                'last_name'     => ' ',
                'password'      => bcrypt('judge1234'),
            ],
            [
                'email'         => 'judge2@gmail.com',
                'first_name'    => 'Judge2',
                'middle_name'   => ' ',
                'last_name'     => ' ',
                'password'      => bcrypt('judge1234'),
            ],
            [
                'email'         => 'judge3@gmail.com',
                'first_name'    => 'Judge3',
                'middle_name'   => ' ',
                'last_name'     => ' ',
                'password'      => bcrypt('judge1234'),
            ],
            [
                'email'         => 'judge4@gmail.com',
                'first_name'    => 'Judge4',
                'middle_name'   => ' ',
                'last_name'     => ' ',
                'password'      => bcrypt('judge1234'),
            ],
            [
                'email'         => 'judge5@gmail.com',
                'first_name'    => 'Judge5',
                'middle_name'   => ' ',
                'last_name'     => ' ',
                'password'      => bcrypt('judge1234'),
            ],
        ];
        
        foreach($judges as $judge)
        {
            $createJudge = User::firstOrCreate(
                [
                    'email' => $judge['email']
                ],
                [
                    'first_name'     => $judge['first_name'],
                    'middle_name'    => $judge['middle_name'],
                    'last_name'      => $judge['last_name'],
                    'password'       => $judge['password'],
                ]
            );

            $createJudge->assignRole($judgeRole);
        }

        $admin->assignRole($superAdminRole);
    }
}