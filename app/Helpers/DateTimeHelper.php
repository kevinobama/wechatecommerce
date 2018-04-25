<?php
namespace App\Helpers;

use DateTime;

class DateTimeHelper {

    public static function compareDateTime($dateTimeA, $dateTimeB)
    {
        $expireDateTime = new DateTime($dateTimeA);
        $dateTimeNow = new DateTime($dateTimeB);

        if ($expireDateTime > $dateTimeNow) {
            return true;
        } else {
            return false;
        }
    }
}