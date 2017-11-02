<?php

class UsersTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'name'     => 'Josh Kung',
        'email'    => 'josh@gmail.com',
        'password' => Hash::make('password')
    ));
}

}
