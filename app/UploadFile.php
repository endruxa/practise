<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['url'];

    //relation with articles
    public function articles()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
