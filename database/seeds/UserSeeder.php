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
        DB::table('users')->insert([
            'name' => "John Doe",
            'email' => 'john@doe.com',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => "José Mané",
            'email' => 'ze@mane.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
