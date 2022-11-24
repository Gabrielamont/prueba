<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'user_id' => 1,
            'name' => 'Celular',
        	'price' => 100,
            'iva' => 10,
            'status' => 0,
        ]);

        Product::create([
            'user_id' => 1,
            'name' => 'Manga',
        	'price' => 100,
            'iva' => 10,
            'status' => 0,
        ]);

        Product::create([
            'user_id' => 1,
            'name' => 'Anime',
        	'price' => 100,
            'iva' => 10,
            'status' => 0,
        ]);

        Product::create([
            'user_id' => 1,
            'name' => 'Videojuego',
        	'price' => 100,
            'iva' => 10,
            'status' => 0,
        ]);

        Product::create([
            'user_id' => 1,
            'name' => 'Pelicula',
        	'price' => 100,
            'iva' => 10,
            'status' => 0,
        ]);
    }
}
