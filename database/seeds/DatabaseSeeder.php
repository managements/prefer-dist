<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CitiesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(StoresTableSeeder::class);
        $this->call(DealsTableSeeder::class);
        $this->call(FinancesTableSeeder::class);
        $this->call(BuysTableSeeder::class);
        $this->call(SalesTableSeeder::class);
    }
}
