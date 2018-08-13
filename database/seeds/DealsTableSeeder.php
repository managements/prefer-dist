<?php

use Illuminate\Database\Seeder;

class DealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 11 ; $i++)
        \App\Deal::create([
            'slug'          => ($i <= 5) ? str_slug("provider $i") : str_slug("client $i"),
            'name'          => ($i <= 5) ? "provider $i" : "client $i",
            'email'         => ($i <= 5) ? "provider$i@ly.ly" : "client$i@ly.ly",
            'tel'           => ($i <= 9) ? "066145287$i" : "06614528$i",
            'speaker'       => "speaker-$i",
            'address'       => "address address address address ",
            'description'   => "description description description description description ",
            'provider'      => ($i <= 5) ? true : false,
            'client'        => ($i > 5) ? true : false,
            'user_id'       => ($i <= 5) ? 5 : 6,
            'city_id'       => 1,
            'company_id'    => 1
        ]);
    }
}
