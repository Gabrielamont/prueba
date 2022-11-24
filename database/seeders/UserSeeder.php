<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'rol_id' => 1,
        	'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt(123456),
            'cash' => 200,
        ]);

        User::create([
            'rol_id' => 2,
        	'name' => 'purchaser',
            'email' => 'purchaser@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt(123456),
            'cash' => 1000,
        ]);
    }
}
