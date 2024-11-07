<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;




class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $users = [
            ['name'=>'admin','email'=>'admin@gmail.com','password'=>Hash::make('12345')],
        ];
        DB::table('users')->insert($users);
    }
}
