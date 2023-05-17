<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class User_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Nitin Mharanur',
                    'email' => 'nitinmharanur@gmail.com',
                    'phone_no' => '8424838221',
                    'password' => Hash::make('password'),
                    'role' => 'admin',
                ],
                [
                    'name' => 'Bhavish',
                    'email' => 'bhavish@editor.com',
                    'phone_no' => '7721181331',
                    'password' => Hash::make('password'),
                    'role' => 'editor'
                ]
            ]
        );
    }
}
