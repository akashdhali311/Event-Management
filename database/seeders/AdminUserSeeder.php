<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('users')->delete();
        \DB::table('users')->insert(array(
            0=>
                array(
                   'id'=>1,
                    'first_name'=>'Mr',
                    'last_name'=>'admin',
                    'username'=>'admin',
                    'email'=>'admin@gmail.com',
                    'password'=>Hash::make(123456),
                    'is_admin'=>true,
                    'is_active'=>true,
                    'email_verified_at'=>'2023-04-12 11:11:11', 




                ),

                1=>
                array(
                   'id'=>2,
                    'first_name'=>'Mr',
                    'last_name'=>'admin',
                    'username'=>'admin2',
                    'email'=>'admin2@gmail.com',
                    'password'=>Hash::make(123456),
                    'is_admin'=>true,
                    'is_active'=>true,
                    'email_verified_at'=>'2023-04-12 11:11:11', 




                )
        ));

    }
    
}
