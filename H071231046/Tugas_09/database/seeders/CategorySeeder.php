<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{

    public function run()
    {

        // Contoh kategori
        $categories = [
            'Electronics',
            'Books',
            'Fashion',
            'Home Appliances',
            'Sports',
            'Toys',
            'Beauty Products',
            'Automotive',
            'Groceries',
            'Furniture'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
            // // Data contoh untuk kategori
            // Category::create(['name' => 'Electronics', 'description' => 'Electronic items like mobile phones, laptops, etc.']);
            // Category::create(['name' => 'Clothing', 'description' => 'Apparel and clothing items.']);
            // Category::create(['name' => 'Groceries', 'description' => 'Daily groceries and essentials.']);
        }
    }
}