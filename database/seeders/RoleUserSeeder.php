<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;
class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
            'id' => 1,
        	'name' => 'admim',
        ]);

        Rol::create([
            'id' => 2,
        	'name' => 'client',
        ]);
    }
}
