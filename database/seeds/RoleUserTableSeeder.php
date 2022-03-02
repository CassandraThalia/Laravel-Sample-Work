<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $userAdmin = DB::table('roles')->where('name', '=', 'User Administrator')->first();
        $moderator = DB::table('roles')->where('name', '=', 'Moderator')->first();
        $themeManager = DB::table('roles')->where('name', '=', 'Theme Manager')->first();

        $janeUserAdmin = DB::table('users')->where('name', '=', 'Jane UserAdmin')->first();
        $bobModerator = DB::table('users')->where('name', '=', 'Bob Moderator')->first();
        $susanThemeAdmin = DB::table('users')->where('name', '=', 'Susan ThemeAdmin')->first();
        $joeNewguy = DB::table('users')->where('name', '=', 'Joe Newguy')->first();

        DB::table('role_user')->insert([
            'user_id' => $janeUserAdmin->id,
            'role_id' => $userAdmin->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('role_user')->insert([
            'user_id' => $bobModerator->id,
            'role_id' => $moderator->id,
            'created_at' => now(),
        ]);
        DB::table('role_user')->insert([
            'user_id' => $susanThemeAdmin->id,
            'role_id' => $themeManager->id,
            'created_at' => now(),
        ]);

    }
}
