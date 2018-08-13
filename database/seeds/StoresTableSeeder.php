<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 6; $i++) {
            \App\Section::create(['name' => "section-$i", 'store_id' => 1]);
        }
        for ($i = 1; $i < 26; $i++) {
            if ($i < 5) {
                $section_id = 1;
            } elseif ($i < 10) {
                $section_id = 2;
            } elseif ($i < 15) {
                $section_id = 3;
            } elseif ($i < 20) {
                $section_id = 4;
            } else {
                $section_id = 5;
            }
            \App\Product::create(['img' => 'product/product-1.jpg', 'name' => "product-$i", 'description' => 'description description description description ', 'size' => '10x15x13', 'qt' => $i * 5, 'qt_min' => $i, 'value_min' => null, 'value_max' => null, 'ref' => "PRO-0$i", 'tva' => 20, 'section_id' => $section_id,]);
        }
    }
}
