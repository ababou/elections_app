<?php



// database/seeders/CommuneSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commune;

class CommuneSeeder extends Seeder
{
    public function run()
    {
        $communes = ['جماعة اليوسفية',  'جماعة الرباط حسان','جماعة السويسي', 'جماعة التواركة'];

        foreach ($communes as $name) {
            Commune::create(['name' => $name]);
        }
    }
}
