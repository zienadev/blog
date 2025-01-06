<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     'name' =>"mohammad",
        //     'email' => "admin@admin.com",
        //     'password' => Hash::make('123123123'),
        //     'img' =>'1703715063.png',
        //     'isAdmin'=>1,
        // ]);
        User::create([
            'name' => 'zeina ahmad',
            'email' => 'zeina@gmail.com',
            'password' => Hash::make('password'),
            'image' => 'ciudades-universitarias-espana-1450x967 (1).jpg',
            'is_admin' => true
        ]);
    }
}
