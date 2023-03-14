<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'name' => 'Mai Xuân Cường',
                'email' => 'cuong12@gmail.com',
                'gender' => 'nu',
                'phone' => '0368849',
                'address' => 'Cam Hiếu - Cam Lộ - Quảng Trị',
                'image' => 'anh',
                'password' => bcrypt('123456') 
            ],
          
        ]);
    }
}
