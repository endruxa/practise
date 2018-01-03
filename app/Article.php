<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = ['title', 'slug', 'description_short', 'description', 'image', 'image_show', 'meta_title', 'meta_description',
        'meta_keyword', 'published', 'created_by', 'modified_by'];


    //Mutators
    public function setSlugAttribute()
    {
        $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40). " - " . Carbon::now()->format('dmyHi'),
            '-');
    }


    public function setDescriptionAttribute($value)
    {
        $this->attributes['description_short'] = strip_tags($value);
    }


    //Polymorphic relation with categories
    public function categories()
    {
        return $this->morphToMany('App\Category', 'categoryable');
    }


    public function scopeLastArticles($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }

    /*public function user()
    {
        return $this->belongsTo(User::class);
    }*/
}
