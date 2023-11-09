<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run(): void
    {
        Product::create([
            'name' => 'Al-phard',
            'category_id' => 1,
        ]);
        Product::create([
            'name' => 'Mercy',
            'category_id' => 1,
        ]);
    }

}
