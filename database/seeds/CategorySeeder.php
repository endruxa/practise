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

        /*\App\Category::create(
            [
                'id' => 1,
                'title'       => 'News',
                'slug'        => 'News_date',
                'parent_id'   => 0,
                'published'   => 1,
                'created_by'  => 1,
                'modified_by' => 0,
                'created_at'  => \Illuminate\Support\Carbon::now(),
                'updated_at'  => 0
            ]
        );*/
    }
}
