<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('status')->insert([
            'nu_status'      => 1
        ]);

          DB::table('status')->insert([
            'nu_status'      => 2
        ]);

    }
}
