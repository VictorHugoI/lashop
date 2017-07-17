<?php

namespace App\MyHelpers;

class TimeNotification
{
	public static function calculateTime($date){
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $start  = date_create($date);
        $end    = date_create(); // Current time and date
        $diff   = date_diff( $start, $end );

        if($diff->y > 0) {
            $time = $diff->y . " năm trước";
        }
        else if($diff->m >0) {
            $time = $diff->m ." tháng trước";
        }
        else if($diff->d >0) {
            $time = $diff->d ." ngày trước";
        }
        else if($diff->h >0) {
            $time = $diff->h ." giờ trước";
        }
        else if($diff->i >0) {
            $time = $diff->i." phút trước";
        }
        else if($diff->s >=0) {
            $time = $diff->s." giây trước";
        }


        return $time;
	}
}
