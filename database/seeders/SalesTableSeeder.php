<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sales;
use App\Models\Product;

class SalesTableSeeder extends Seeder
{
    public function run()
    {
        // Ambil beberapa produk untuk dijadikan data dummy
        $products = Product::take(10)->get();

        foreach ($products as $product) {
            Sales::create([
                'product_id' => $product->id,
                'name' => $product->name,
                'category' => $product->category,
                'description' => $product->description,
                'price' => $product->price,
                'stock' => 0, // Set stock to 0
                'image' => $product->image, // Add image field
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
