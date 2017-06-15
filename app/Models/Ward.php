<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $fillable = [
        'id',
        'name',
        'province_id',
    ];

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
