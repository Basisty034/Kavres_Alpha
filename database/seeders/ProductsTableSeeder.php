<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $categories = ['motherboard', 'antenna', 'microchip', 'semiconductor'];

        foreach ($categories as $category) {
            for ($i = 1; $i <= 10; $i++) {
                Product::create([
                    'name' => "product{$i}",
                    'description' => "Description for product{$i} in category {$category}",
                    'price' => rand(100, 1000),
                    'stock' => rand(1, 100),
                    'category' => $category,
                    'image' => 'default.png', // Pastikan Anda memiliki gambar default.png di public/img/products
                    'seller_id' => 1, // Pastikan Anda memiliki seller dengan ID 1
                ]);
            }
        }
    }
}