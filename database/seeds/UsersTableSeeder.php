<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

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
		
		$width=100;
        $height=100;
        $faker = Faker::create();
        //looping for seeding member account
        for ($i=0; $i < 20; $i++) {
            DB::table('users')->insert([
                'name'=>$faker->name,
                'email'=>$faker->email,
                'password'=>bcrypt($faker->password),
                'phone'=>$faker->phoneNumber,
                'gender'=>$faker->randomElement(['male', 'female']),
                'address'=>$faker->address,
                'birthday'=>$faker
                ->date('Y-m-d'),
                'profile'=>$faker->imageUrl($width,$height),
                'role'=>"member"
            ]);
        }
    }
}
