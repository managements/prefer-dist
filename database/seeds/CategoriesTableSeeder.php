<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['pdg', 'accounting', 'commercial', 'delivery_man', 'storekeeper'];
        foreach ($categories as $category)
            \App\Category::create([
                'category'  => $category
            ]);
    }
}
