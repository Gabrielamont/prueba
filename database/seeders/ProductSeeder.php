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
        	'price' => 39.73,
            'iva' => 12,
            'status' => 0,
        ]);

        Product::create([
            'user_id' => 1,
            'name' => 'Anime',
        	'price' => 250.00,
            'iva' => 8,
            'status' => 0,
        ]);

        Product::create([
            'user_id' => 1,
            'name' => 'Videojuego',
        	'price' => 123.45,
            'iva' => 5,
            'status' => 0,
        ]);

        Product::create([
            'user_id' => 1,
            'name' => 'Pelicula',
        	'price' => 45.65,
            'iva' => 15,
            'status' => 0,
        ]);
    }
}
