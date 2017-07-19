<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name',
        'label',
        'data_type',
        'measure_unit',
    ];

    public function categoryProperties()
    {
        return $this->hasMany(CategoryProperty::class);
    }
}
