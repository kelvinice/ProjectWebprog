<?php

use Illuminate\Database\Seeder;

class ForumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forums')->insert([
            ['name' => 'Artifact','category_id'=>1,'description'=>'Artifact By Valve','created_at' => date('Y-m-d H:i:s'),'status'=>'Open','user_id' => 1],
            ['name' => 'Dota 2','category_id'=>1,'description'=>'Dota 2 By Valve','created_at' => date('Y-m-d H:i:s'),'status'=>'Open','user_id' => 1],
            ['name' => 'Cocoklogi Science','category_id'=>2,'description'=>'Apapun yang penting cocok','created_at' => date('Y-m-d H:i:s'),'status'=>'Open','user_id' => 1],
        ]);
    }
}
