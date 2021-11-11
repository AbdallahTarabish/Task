<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'john doe';
        $user->email = "doe@gmail.com";
        $user->password = bcrypt('123456');
        $user->save();
    }
}
