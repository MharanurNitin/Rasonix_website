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
        DB::table('users')->insert([
            'name'=>'Bhavish Muneshwar',
            'email'=>'Bhavishm009@gmail.com',
            'phone_no'=>'7721841331',
            'password'=>Hash::make('12345678')
        ]);
    }
}
