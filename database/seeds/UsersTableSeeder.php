<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'admin','email'=> 'admin@admin.com', 'password' => '$2y$10$zanB/R7XOfhJpjyn2Uauqu4X4WdErJAsgVNCyXzpnsg0QSUrtz1Iu', 'phone' => '123123', 'gender' => 'male', 'address' => 'Kemanggisan street', 'birthday' => '1998-10-13', 'profile' => 'admin@admin.com.png', 'role' => 'admin'],
            ['name' => 'member','email'=> 'member@member.com', 'password' => '$2y$10$e42gP9pFnxAauCcabqNBnuFwCxxpXA6nVMujcy0Mo6iI6eJ9ADFL.', 'phone' => '123123', 'gender' => 'male', 'address' => 'Syahdan street', 'birthday' => '1998-10-13', 'profile' => 'member@member.com.png', 'role' => 'member'],

        ]);
    }
}
