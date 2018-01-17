<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Category;

class Article extends Model
{
    protected $fillable = ['title', 'slug','description_short', 'description', 'meta_title', 'meta_description',
        'meta_keyword', 'published', 'created_by', 'modified_by', 'category_id', 'user_id'];

    //Mutators

    /**
     * @param $value
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40). " - " . Carbon::now()->format('d-m-y-H-i'));
    }


    public function setDescriptionShortAttribute($value)
    {
        $this->attributes['description_short'] = strip_tags($value);
    }


    public function scopeLastArticles($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }

    public function scopePublished($query, $published)
    {
        return $query->where('published', $published)->take(2)->get();
    }

    public function scopeOrderByCreated($query)
    {
        return $query->orderBy('created_at');
    }

    //relation with user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //relation with categories
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    //relation with uploadFile
    public function uploadFile()
    {
        return $this->hasMany(UploadFile::class, 'article_id');
    }

}
