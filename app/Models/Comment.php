<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'content',
    ];

    protected $appends = [
        'username',
        'avatar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getUsernameAttribute()
    {
        return $this->user->name;
    }

    public function getAvatarAttribute()
    {
        return $this->user->url;
    }
}
