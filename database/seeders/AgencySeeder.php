<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Agency;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agency::factory(1)->create();
    }
}
