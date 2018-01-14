<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    //Mass assigned
    protected $fillable = ['title', 'slug', 'parent_id', 'published', 'created_by', 'modified_by'];


    //Mutators
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40). " - " . Carbon::now()->format('d-m-y-H-i'));
    }

    /*public static function categories_id_list()
    {
        return static::pluck('title', 'id', 'parent_id')->toarray();
    }

    public function shareId()
    {
        \View::composer('layouts._top_menu.blade', function ($view)
        {
            $view->with('categories_id_list', static::categories_id_list());
        });
    }*/

    //Get children category
    public function children(){

        return $this->hasMany(self::class, 'parent_id');
    }

    //relation with articles
    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id');
    }


    public function scopeLastCategories($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }

    /* public function user()
     {
         return $this->belongsTo(User::class);
     }*/

}
