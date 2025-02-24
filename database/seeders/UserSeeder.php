<?php
// database/seeders/UserSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Proprietaire;
use App\Models\Touriste;

class UserSeeder extends Seeder
{
    public function run()
    {
        Admin::factory()->count(10)->create();
        Proprietaire::factory()->count(5)->create();
        Touriste::factory()->count(20)->create();
    }
}
