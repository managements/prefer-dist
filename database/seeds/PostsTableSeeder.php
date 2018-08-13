<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Post::create([
            'img'           => null,
            'first_name'    => 'first_post',
            'last_name'     => 'last_post',
            'post'          => 'accounting',
            'tel'           => '0661235689',
            'email'         => 'post@ly.ly',
            'company_id'    => 1
        ]);
    }
}
