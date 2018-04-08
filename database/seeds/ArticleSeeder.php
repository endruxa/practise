<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Article::class, 'admin', 1)->create()/*->each(function ($categories)
        {
            $categories->categories()->save(App\Category::class)->make();
        })*/;
    }
}
