<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {

        $faker = Faker::create('id_ID');
        $categories = Category::all();

        foreach (range(1, 100) as $index) {
            Product::create([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 10000, 1000000), // Harga dalam Rupiah
                'stock' => $faker->numberBetween(1, 100),
                'category_id' => $categories->random()->id,
            ]);
            //         // Ambil kategori untuk referensi Foreign Key
//         $electronics = Category::where('name', 'Electronics')->first();
//         $clothing = Category::where('name', 'Clothing')->first();
//         $groceries = Category::where('name', 'Groceries')->first();

            //         // Data contoh untuk produk
//         Product::create(['name' => 'Laptop', 'description' => 'High performance laptop', 'price' => 1500000, 'stock' => 20, 'category_id' => $electronics->id]);
// Product::create(['name' => 'Smartphone', 'description' => 'Latest model smartphone', 'price' => 700000, 'stock' => 50, 'category_id' => $electronics->id]);
// Product::create(['name' => 'Jeans', 'description' => 'Comfortable denim jeans', 'price' => 50000, 'stock' => 100, 'category_id' => $clothing->id]);
// Product::create(['name' => 'T-shirt', 'description' => 'Casual t-shirt', 'price' => 20000, 'stock' => 150, 'category_id' => $clothing->id]);
// Product::create(['name' => 'Rice', 'description' => '5kg pack of rice', 'price' => 10000, 'stock' => 200, 'category_id' => $groceries->id]);

        }
    }
}