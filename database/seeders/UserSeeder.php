<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserDisability;
use App\Models\Disability;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        $records = [
            ['first'=>'Princess',         'middle'=>null,            'last'=>'Arsolon',    'pwd_id'=>'13-7607-000-0011392', 'disability'=>'Orthopedic'],
            ['first'=>'Micaela',          'middle'=>'Soriano',       'last'=>'Arresgado',  'pwd_id'=>'13-7607-000-0003249', 'disability'=>'Visual'],
            ['first'=>'Precious Camille', 'middle'=>'Racaza',        'last'=>'Basarte',    'pwd_id'=>'13-7607-000-0033829', 'disability'=>'Orthopedic'],
            ['first'=>'Rachel',           'middle'=>'Paña',          'last'=>'Bionesta',   'pwd_id'=>'13-7607-000-0033655', 'disability'=>'Intellectual'],
            ['first'=>'RJ',               'middle'=>'Salvador',      'last'=>'Brujan',     'pwd_id'=>'13-7607-000-0034610', 'disability'=>'Orthopedic'],
            ['first'=>'Jake',             'middle'=>'Oñate',         'last'=>'Bueno',      'pwd_id'=>'13-7607-000-0002785', 'disability'=>'Visual'],
            ['first'=>'Jazzy Whayne',     'middle'=>'Fernandez',     'last'=>'Cabradilla', 'pwd_id'=>'13-7607-000-0022311', 'disability'=>'Learning'],
            ['first'=>'Jan Lenard',       'middle'=>'Lagasca',       'last'=>'Cajes',      'pwd_id'=>'13-7607-000-0003527', 'disability'=>'Hearing'],
            ['first'=>'Therese',          'middle'=>'Rivera',        'last'=>'Caliwan',    'pwd_id'=>'13-7607-000-0011527', 'disability'=>'Learning'],
            ['first'=>'Yvann Manuel',     'middle'=>'Presto',        'last'=>'Coderes',    'pwd_id'=>'13-7607-000-0022745', 'disability'=>'Learning'],
            ['first'=>'Arnold Jr',        'middle'=>'M',             'last'=>'Concepcion', 'pwd_id'=>'13-7607-000-00000224', 'disability'=>'Intellectual'],
            ['first'=>'Jeslyn Faith',     'middle'=>null,            'last'=>'Dayrit',     'pwd_id'=>'137602014-0151',     'disability'=>'Intellectual'],
            ['first'=>'John Clyde',       'middle'=>'Castañeto',     'last'=>'De Guzman',  'pwd_id'=>'13-7607-000-0038642', 'disability'=>'Intellectual'],
            ['first'=>'Denise',           'middle'=>'Valdez',        'last'=>'Dela Cruz',  'pwd_id'=>'13-7607-000-0036708', 'disability'=>'Orthopedic'],
            ['first'=>'Samantha',         'middle'=>'Aragon',        'last'=>'Gamboa',     'pwd_id'=>'13-7607-000-0036576', 'disability'=>'Intellectual'],
            ['first'=>'John Daniel',      'middle'=>'Fenellere',     'last'=>'Gello-ano',  'pwd_id'=>'13-7607-000-0040046', 'disability'=>'Intellectual'],
            ['first'=>'Christopher John', 'middle'=>'Araja',         'last'=>'Helder',     'pwd_id'=>'13-7607-000-0027439', 'disability'=>'Visual'],
            ['first'=>'Xaniel Mikrej',    'middle'=>'Cruz',          'last'=>'Lim',        'pwd_id'=>'13-7607-000-0026445', 'disability'=>'Visual'],
            ['first'=>'Celso Anthony',    'middle'=>'Glomo',         'last'=>'Mamansag',   'pwd_id'=>'13-7607-000-0018359', 'disability'=>'Intellectual'],
            ['first'=>'Louie James',      'middle'=>'Manegded',      'last'=>'Matira',     'pwd_id'=>'13-7607-000-0012495', 'disability'=>'Learning'],
            ['first'=>'Raffaelle Majella','middle'=>'Gamez',         'last'=>'Mercado',    'pwd_id'=>'137607022-160',      'disability'=>'Orthopedic'],
            ['first'=>'Ben Nicol',        'middle'=>'Colarina',      'last'=>'Nacario',    'pwd_id'=>'13-7607-000-0013562', 'disability'=>'Intellectual'],
            ['first'=>'Jhudiel David',    'middle'=>null,            'last'=>'Olivar',     'pwd_id'=>'137607025-306',      'disability'=>'Intellectual'],
            ['first'=>'Meahshane',        'middle'=>'Banatasa',      'last'=>'Omane',      'pwd_id'=>'137607022-234',      'disability'=>'Visual'],
            ['first'=>'Dharrion Kieth',   'middle'=>'Benitez',       'last'=>'Roxas',      'pwd_id'=>'13-7607-000-0022860', 'disability'=>'Intellectual'],
            ['first'=>'Christian Cire',   'middle'=>'Baloso',        'last'=>'Sanchez',    'pwd_id'=>'13-7607-000-0028901', 'disability'=>'Intellectual'],
            ['first'=>'Rendyel',          'middle'=>'Fuentes',       'last'=>'Solomon',    'pwd_id'=>'13-7607-000-0037097', 'disability'=>'Hearing'],
            ['first'=>'Elton Clint',      'middle'=>'Tillo',         'last'=>'Torres',     'pwd_id'=>'13-7607-000-0025713', 'disability'=>'Intellectual'],
            ['first'=>'Charls Allen',     'middle'=>'Babaran',       'last'=>'Veluya',     'pwd_id'=>'13-7607-000-0009887', 'disability'=>'Intellectual'],
        ];

        foreach ($records as $item) {
            $emailLocal = Str::slug($item['last'], '');
            $email      = $emailLocal . '@gmail.com';
            $digits   = preg_replace('/\D/', '', $item['pwd_id']);
            $password = substr($digits, -7);

            $user = User::create([
                'first_name'  => $item['first'],
                'middle_name' => $item['middle'],
                'last_name'   => $item['last'],
                'email'       => $email,
                'password'    => $password, 
            ]);
            $user->assignRole('user');
            
            $dis = Disability::where('name', $item['disability'])->first();
            if ($dis) {
                UserDisability::create([
                    'user_id'       => $user->id,
                    'disability_id' => $dis->id,
                ]);
            }
        }
    }
}