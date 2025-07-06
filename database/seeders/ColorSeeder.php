<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        Color::create(['name' => 'Red']);
        Color::create(['name' => 'Yellow']);
        Color::create(['name' => 'Blue']);
        Color::create(['name' => 'Black']);
    }
}
