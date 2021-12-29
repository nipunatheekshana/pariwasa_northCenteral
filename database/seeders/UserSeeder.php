<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'admin@gmail.com',
            'role'=>'admin',
            'password' => Hash::make(12345)
        ]);
        // DB::table('users')->insert([
        //     'name' => 'John Doe',
        //     'email' => 'nipuna@gmail.com',
        //     'role'=>'probationUnitUser',
        //     'probationUnitid'=>'1',
        //     'password' => Hash::make(12345)
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'John Doe',
        //     'email' => 'nipuna2@gmail.com',
        //     'role'=>'probationCenterUser',
        //     'probationCenterId'=>'1',
        //     'password' => Hash::make(12345)
        // ]);
    }
}
