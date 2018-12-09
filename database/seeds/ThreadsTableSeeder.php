<?php

use Illuminate\Database\Seeder;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('threads')->insert([
            ['forum_id' => 1,'user_id' => 1,'content' => 'blablabla','created_at' => date('Y-m-d H:i:s'),],
            ['forum_id' => 1,'user_id' => 2,'content' => 'qweqweqwe','created_at' => date('Y-m-d H:i:s'),],
        ]);
    }
}
