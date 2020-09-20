<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'agency_id' => 1,
            'user_id'   => 1,
            'number'    => '889955-1',
            'balance'   => '3500.00'
        ]);

        DB::table('accounts')->insert([
            'agency_id' => 1,
            'user_id'   => 2,
            'number'    => '435567-2',
            'balance'   => '100.00'
        ]);
    }
}
