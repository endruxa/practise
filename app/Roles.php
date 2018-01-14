<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Roles extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'group', 'created_at', 'updated_at', 'user_id'];

    public function users()
    {
        return $this->belongsToMany(User::class,  'roles', 'user_id');
    }
}
