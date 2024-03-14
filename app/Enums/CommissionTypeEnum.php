<?php

namespace App\Enums;

enum CommissionTypeEnum: string
{
    case FIXED      = 'FIXED';
    case PERCENTAGE = 'PERCENTAGE';

    public static function toArray() : array {
        $arr = [];
        foreach(self::cases() as $case) {
            $arr[$case->value] = $case->name;
        }
        return $arr;
    }
}
