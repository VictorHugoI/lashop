<?php
namespace App\Helpers;

use App\Models\Setting;

class SettingSystem
{
    public function get($name, $defaultValue = 5)
    {
        return Setting::getValueByName($name, $defaultValue);

    }
}
