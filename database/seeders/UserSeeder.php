<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Nguyễn Đấm Bảo Thắng';
        $user->email = 'cun2004@gmail.com';
        $user->password = Hash::make('123456');
        $user->birthday = '2004/01/01';
        $user->address = 'Núi lửa';
        $user->image = '1jCVdawgaYEAN8g7RCOxHH1mkA9IJcixSfQlmkNk.png';
        $user->phone = '0935779035';
        $user->gender = 'Nam';
        $user->group_id = '1';
        $user->save();
    }
}
