<?php

namespace App\Enums;

class AppointmentStatus
{
    public const SCHEDULED = 1;
    public const CONFIRMED = 2;
    public const CANCELLED = 3;

    public static function color($status): string
    {
        switch ($status) {
            case self::SCHEDULED:
                return 'primary';
            case self::CONFIRMED:
                return 'success';
            case self::CANCELLED:
                return 'danger';
            default:
                return 'secondary'; // or any other default color
        }
    }
}
