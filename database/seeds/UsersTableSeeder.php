<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Jane UserAdmin',
            'email' => 'jane@example.com',
            'password' => bcrypt('pass0000'),
            'created_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Bob Moderator',
            'email' => 'bob@example.com',
            'password' => bcrypt('pass0000'),
            'created_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Susan ThemeAdmin',
            'email' => 'susan@example.com',
            'password' => bcrypt('pass0000'),
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Sarah Enduser',
            'email' => 'sarah@example.com',
            'password' => bcrypt('pass0000'),
            'created_at' => now()
        ]);
    }
}
