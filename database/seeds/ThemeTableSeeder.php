<?php

use Illuminate\Database\Seeder;

class ThemeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert([
            'name' => 'Darkly',
            'cdn_url' => 'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/darkly/bootstrap.min.css',
            'created_by' => 3
        ]);
        DB::table('themes')->insert([
            'name' => 'Journal',
            'cdn_url' => 'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/journal/bootstrap.min.css',
            'created_by' => 3
        ]);
        DB::table('themes')->insert([
            'name' => 'Lumen',
            'cdn_url' => 'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lumen/bootstrap.min.css',
            'created_by' => 3
        ]);
        DB::table('themes')->insert([
            'name' => 'Lux',
            'cdn_url' => 'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lux/bootstrap.min.css',
            'created_by' => 3
        ]);
        DB::table('themes')->insert([
            'name' => 'Minty',
            'cdn_url' => 'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/minty/bootstrap.min.css',
            'created_by' => 3
        ]);
        DB::table('themes')->insert([
            'name' => 'Sketchy',
            'cdn_url' => 'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/sketchy/bootstrap.min.css',
            'created_by' => 3
        ]);
    }
}
