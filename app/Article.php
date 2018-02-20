<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Category;
use App\Comment;

class Article extends Model
{
    protected $table = "articles";
    protected $fillable = ['title', 'slug','description_short', 'description', 'meta_title', 'meta_description',
        'meta_keyword', 'published', 'created_by', 'modified_by', 'user_id'];

    //Mutators

    /**
     * @param $value
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40). " - " . Carbon::now()->format('d-m-y-H-i'));
    }

    public function scopeLastArticles($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }

    public function getCategoryIdAttribute()
    {
        return $this->categories()->pluck('id');
    }

    //relation with user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //relation with categories
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    //relation with comments
    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id');
    }
}
