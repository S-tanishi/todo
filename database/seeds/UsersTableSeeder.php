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
            'name' => 'test',
            'email' => 'dummy@email.com',
            'password' => bcrypt('test1234'),
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ]);
    }
}
