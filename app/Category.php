<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    //Mass assigned
    protected $fillable = ['title', 'slug', 'parent_id', 'published', 'created_by', 'modified_by'];


   /* public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
    }*/

    //Mutators
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = str_slug($title);/*Str::slug(mb_substr($this->title, 0, 40). " - " . Carbon::now()->format('d-m-y-H-i'),
    '-');*/
    }

    //Get children category
    public function children(){

        return $this->hasMany(self::class, 'parent_id');
    }

    //Polymorphic relation with articles
    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id');
    }

    public function scopeLastCategories($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
