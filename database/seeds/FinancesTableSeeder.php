<?php

use Illuminate\Database\Seeder;

class FinancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Spent::create([
            'cash'          => 0,
            'freeze'        => 0,
            'finance_id'    => 1
        ]);
        \App\Gain::create([
            'cash'          => 0,
            'freeze'        => 0,
            'finance_id'    => 1
        ]);
    }
}
