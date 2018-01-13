<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class UserAdditionals extends Model
{
    protected $fillable = ['user_id', 'firstname', 'lastname', 'patronomic', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
