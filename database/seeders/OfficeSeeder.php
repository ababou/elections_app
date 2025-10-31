<?php


namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    public function run(): void
    {
       
$offices = [
    ['name' => 'Office 1', 'school_id' => 1, 'user_id' => 1],
    ['name' => 'Office 2', 'school_id' => 1, 'user_id' => 2],
];

        foreach ($offices as $office) {
            Office::create($office);
        }
    }
}
