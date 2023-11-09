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
            'product_code'=>'P0001',
            'description'=>'Al-Phard 2000CC Solar',
            'price'=>'50000',
            'unit'=>'unit',
            'stock'=>'2'
        ]);
        Product::create([
            'name' => 'Mercy',
            'category_id' => 1,
            'product_code'=>'P0003',
            'description'=>'Mercy 200CC Bensin',
            'price'=>'60000',
            'unit'=>'unit',
            'stock'=>'4'
        ]);
    }

}
