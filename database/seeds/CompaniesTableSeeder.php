<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = \App\Company::create([
            'brand'     => 'brands/logo.png',
            'slug'      => str_slug('LY S.A.R.L'),
            'name'      => 'LY S.A.R.L',
            'licence'   => '123456MLA',
            'turnover'  => '100000',
            'taxes'     => '32',
            'email'     => 'company@ly.ly',
            'tel'       => '0522834565',
            'speaker'   => 'yasser',
            'address'   => 'BD mohamed 6 Jamila I',
            'build'     => '1443',
            'floor'     => '1',
            'apt_nbr'   => '1',
            'zip'       => '23000',
            'city_id'   => 1,
            'status_id' => 2,
            'sold'      => 200,
            'range'     => 0,
            'limit'     => gmdate('Y-m-d H:i:s',strtotime('+365 days'))
        ]);
        \App\Store::create([
            'company_id' => $company->id
        ]);
        \App\Trade::create([
            'ht'            => 0,
            'tva'           => 0,
            'ttc'           => 0,
            'taxes'         => 0,
            'total_tva'     => 0,
            'total_taxes'   => 0,
            'company_id'    => $company->id
        ]);
        \App\Finance::create([
            'sold'          => 0,
            'company_id'    => $company->id
        ]);
    }
}
