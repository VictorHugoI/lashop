<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name',
        'label',
    ];

    public function categoryProperties()
    {
        return $this->hasMany(CategoryProperty::class);
    }
}
