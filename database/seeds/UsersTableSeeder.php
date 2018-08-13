<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'          => "admin",
            'email'         => "admin@ly.ly",
            'password'      => bcrypt('066145392mM'),
            'first_name'    => "yasser",
            'last_name'     => "lakhsadi",
            'tel'           => "066145392",
            'dtn'           => date('1987-07-20'),
            'sold'          => null,
            'range'         => null,
            'limit'         => null,
            'status_id'     => null,
            'category_id'   => null,
            'city_id'       => null,
            'company_id'    => null,
        ]);

        \App\User::create([
            'name'          => "pdg",
            'email'         => "pdg@ly.ly",
            'password'      => bcrypt('066145392mM'),
            'first_name'    => "first_pdg",
            'last_name'     => "last_pdg",
            'tel'           => "066145393",
            'dtn'           => date('1987-07-20'),
            'sold'          => 0,
            'range'         => 0,
            'limit'         => gmdate('Y-m-d H:i:s',strtotime("+365 days")),
            'status_id'     => 2,
            'category_id'   => 1,
            'city_id'       => 1,
            'company_id'    => 1,
        ]);

        \App\User::create([
            'name'          => "manager",
            'email'         => "manager@ly.ly",
            'password'      => bcrypt('066145392mM'),
            'first_name'    => "first_manager",
            'last_name'     => "last_manager",
            'tel'           => "066145394",
            'dtn'           => date('1987-07-20'),
            'sold'          => 0,
            'range'         => 0,
            'limit'         => gmdate('Y-m-d H:i:s',strtotime("+365 days")),
            'status_id'     => 2,
            'category_id'   => 2,
            'city_id'       => 1,
            'company_id'    => 1,
        ]);

        \App\User::create([
            'name'          => "accounting",
            'email'         => "accounting@ly.ly",
            'password'      => bcrypt('066145392mM'),
            'first_name'    => "first_account",
            'last_name'     => "last_account",
            'tel'           => "066145395",
            'dtn'           => date('1987-07-20'),
            'sold'          => 0,
            'range'         => 0,
            'limit'         => gmdate('Y-m-d H:i:s',strtotime("+365 days")),
            'status_id'     => 2,
            'category_id'   => 3,
            'city_id'       => 1,
            'company_id'    => 1,
        ]);

        \App\User::create([
            'name'          => "commercial1",
            'email'         => "commercial1@ly.ly",
            'password'      => bcrypt('066145392mM'),
            'first_name'    => "first_commerce1",
            'last_name'     => "last_commerce1",
            'tel'           => "066145396",
            'dtn'           => date('1987-07-20'),
            'sold'          => 0,
            'range'         => 0,
            'limit'         => gmdate('Y-m-d H:i:s',strtotime("+365 days")),
            'status_id'     => 2,
            'category_id'   => 4,
            'city_id'       => 1,
            'company_id'    => 1,
        ]);

        \App\User::create([
            'name'          => "commercial2",
            'email'         => "commercial2@ly.ly",
            'password'      => bcrypt('066145392mM'),
            'first_name'    => "first_commerce2",
            'last_name'     => "last_commerce2",
            'tel'           => "066145397",
            'dtn'           => date('1987-07-20'),
            'sold'          => 0,
            'range'         => 0,
            'limit'         => gmdate('Y-m-d H:i:s',strtotime("+365 days")),
            'status_id'     => 2,
            'category_id'   => 4,
            'city_id'       => 1,
            'company_id'    => 1,
        ]);

        \App\User::create([
            'name'          => "delivery_man",
            'email'         => "delivery_man@ly.ly",
            'password'      => bcrypt('066145392mM'),
            'first_name'    => "first_delivery",
            'last_name'     => "last_delivery",
            'tel'           => "066145398",
            'dtn'           => date('1987-07-20'),
            'sold'          => 0,
            'range'         => 0,
            'limit'         => gmdate('Y-m-d H:i:s',strtotime("+365 days")),
            'status_id'     => 2,
            'category_id'   => 5,
            'city_id'       => 1,
            'company_id'    => 1,
        ]);

        \App\User::create([
            'name'          => "storekeeper",
            'email'         => "storekeeper@ly.ly",
            'password'      => bcrypt('066145392mM'),
            'first_name'    => "first_store",
            'last_name'     => "last_store",
            'tel'           => "066145399",
            'dtn'           => date('1987-07-20'),
            'sold'          => 0,
            'range'         => 0,
            'limit'         => gmdate('Y-m-d H:i:s',strtotime("+365 days")),
            'status_id'     => 2,
            'category_id'   => 6,
            'city_id'       => 1,
            'company_id'    => 1,
        ]);
    }
}
