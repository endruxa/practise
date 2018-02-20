<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = ['title', 'slug', 'parent_id', 'published', 'created_by', 'modified_by'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40). " - " . Carbon::now()->format('H:i d-m-Y'), '-');
    }

    public function children(){

        return $this->hasMany(self::class, 'parent_id');
    }

    //relation with articles
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function scopeLastCategories($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
