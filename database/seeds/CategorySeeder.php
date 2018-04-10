<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class, 'admin', 1)->create()/*->each(function ($articles)
        {
            $articles->articles()->save(App\Article::class)->make();
        })*/;
    }
}
