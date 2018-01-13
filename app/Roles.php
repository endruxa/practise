<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Roles extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'group', 'created_at', 'updated_at', 'roles_id'];

    public function user()
    {
        return $this->belongsToMany(User::class, 'roles_id');
    }
}
