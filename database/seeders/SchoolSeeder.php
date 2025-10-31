<?php


namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    public function run(): void
    {
        $schools = [
            ['name' => 'School A', 'commune_id' => 1],
            ['name' => 'School B', 'commune_id' => 2],
            ['name' => 'School C', 'commune_id' => 3],
        ];

        foreach ($schools as $school) {
            School::create($school);
        }
    }
}
