<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
    
            [
                'name' => 'Iphone14',
                'price' => 34000000,
                'amount' => 5,
                'category_id' => 1,
                'description' => 'Iphone 14 pro chụp hình vẫn là đẹp',
                'image' => 'anh',
                'created_at' => '2022-12-17 04:02:10',
            ],
         
          
        ]);
    }
}
