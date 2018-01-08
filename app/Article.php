<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Category;

class Article extends Model
{
    protected $fillable = ['title', 'description_short', 'description', 'meta_title', 'meta_description',
        'meta_keyword', 'published', 'created_by', 'modified_by', 'category_id'];

    //Mutators
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title ;
        $this->attributes['slug'] = (str_slug($title) . " - " . Carbon::now()->format('d-m-y-H-i'));
        return $this;
    }


    public function setDescriptionShortAttribute($value)
    {
        $this->attributes['description_short'] = strip_tags($value);
    }

   /* public function getCategoryIdAttribute()
    {
        $this->categories()->pluck('id');
    }*/

    public function scopeLastArticles($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //relation with categories
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
