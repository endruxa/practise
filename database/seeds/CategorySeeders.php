<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CategorySeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Бизнес',
            'Культура',
            'Спорт',
            'Финансы',
            'Политика',
            'Юмор',
            'Погода',
            'Гороскоп',
            'Афиша',

        ];

        foreach ($tags as $tag)
        {
            \App\Category::create(['title'=>$tag]);
        }

    }
}
