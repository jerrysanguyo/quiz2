<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Disability;

class DisabilitySeeder extends Seeder
{
    public function run(): void
    {
        $disabilities = [
            'Psychosocial',
            'Chronic Illness',
            'Learning',
            'Mental',
            'Visual',
            'Orthopedic',
            'Communication',
            'Hearing'
        ];

        foreach($disabilities as $disability)
        {
            Disability::firstOrCreate([
                'name' => $disability,
                'remarks' => 'seeder generated',
            ]);
        }
    }
}
