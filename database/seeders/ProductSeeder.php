<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Product 1',
                'description' => 'Description for product 1',
                'price' => 100,
                'photo_path' => 'product1.jpg',
            ],
            [
                'name' => 'Product 2',
                'description' => 'Description for product 2',
                'price' => 200,
                'photo_path' => 'product2.jpg',
            ],
            [
                'name' => 'Product 3',
                'description' => 'Description for product 3',
                'price' => 300,
                'photo_path' => 'product3.jpg',
            ],
            [
                'name' => 'Product 4',
                'description' => 'Description for product 4',
                'price' => 400,
                'photo_path' => 'product4.jpg',
            ],
            [
                'name' => 'Product 5',
                'description' => 'Description for product 5',
                'price' => 500,
                'photo_path' => 'product5.jpg',
            ],
            [
                'name' => 'Product 6',
                'description' => 'Description for product 6',
                'price' => 600,
                'photo_path' => 'product6.jpg',
            ],
            [
                'name' => 'Product 7',
                'description' => 'Description for product 7',
                'price' => 700,
                'photo_path' => 'product7.jpg',
            ],
            [
                'name' => 'Product 8',
                'description' => 'Description for product 8',
                'price' => 800,
                'photo_path' => 'product8.jpg',
            ],
        ]);
    }
}
