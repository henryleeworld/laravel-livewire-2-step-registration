<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        Category::create(['name' => 'Toys']);
        Category::create(['name' => 'Gadgets']);
        Category::create(['name' => 'Food']);
    }
}
