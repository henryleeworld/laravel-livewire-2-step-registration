<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        Listing::factory()->count(10)->create();
    }
}
