<?php

namespace Database\Seeders;

use App\Models\Party;
use Illuminate\Database\Seeder;

class PartySeeder extends Seeder
{
    public function run(): void
    {
        $parties = [
            ['name' => 'Party A'],
            ['name' => 'Party B'],
            ['name' => 'Party C'],
        ];

        foreach ($parties as $party) {
            Party::create($party);
        }
    }
}
