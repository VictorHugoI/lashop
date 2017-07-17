<?php

use App\Models\Setting;

    function setting($name, $defautValue = 5)
    {
        return Setting::getValueByName($name, $defautValue);
    }
