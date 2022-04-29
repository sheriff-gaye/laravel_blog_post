<?php

namespace App\Models;

use App\Models\Likes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable=['body'];



public function user()
{
    return $this->belongsTo(User::class);
}

public function like()
{
    return $this->hasMany(Likes::class);
}

public function likeBy(User $user)
{
    return $this->like->contains('user_id',$user->id);
}

public function ownBy(User $user)
{
    return $user->id==$this->user_id;
}

}




