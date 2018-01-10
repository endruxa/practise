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

    /**
     * @param $title
     * @return $this
     */
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title ;
        $this->attributes['slug'] = (str_slug($title) . " - " . Carbon::now()->format('d-m-y-H-i'));
        return $this;
    }

    /**
     * @param $value
     */
    public function setDescriptionShortAttribute($value)
    {
        $this->attributes['description_short'] = strip_tags($value);
    }

    /**
     * @param $query
     * @param $count
     * @return mixed
     */
    public function scopeLastArticles($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
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
