<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username'     => 'Chris Sevilleja',
            'firstname' =>'james admin',
            'lastname' =>'huang admin',
            'fullname' => 'james huang',
            'phonenumber' =>'1596123212',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role' =>'admin'
        ]);
    }
}
