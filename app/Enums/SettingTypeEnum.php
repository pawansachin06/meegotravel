<?php

namespace App\Enums;

enum SettingTypeEnum: string
{
    case NORMAL   = 'NORMAL';
    case DROPDOWN = 'DROPDOWN';

    public static function toArray() : array {
        $arr = [];
        foreach(self::cases() as $case) {
            $arr[$case->value] = $case->name;
        }
        return $arr;
    }
}
