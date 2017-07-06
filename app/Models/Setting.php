<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Setting extends Model
{
    protected $fillable = [
        'name',
        'value',
        'type',
    ];


    public static function getValueByName($name, $defaultValue)
    {
        static $settings = [];
        if (array_key_exists($name, $settings)) {
            return $settings[$name];
        }

        if (Cache::has($name)) {
            return $settings[$name] = Cache::get($name);
        }

        $value = Setting::where('name', $name)->pluck('value')->first();
        if (isset($value)) {
            $settings[$name] = $value;
        } else {
            $settings[$name] = $defaultValue;
        }
        $timeExpirestAt = \Carbon\Carbon::now()->addDay(1);
        Cache::put($name, $settings[$name], $timeExpirestAt);
        return $settings[$name];
    }
}
