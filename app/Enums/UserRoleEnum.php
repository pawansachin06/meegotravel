<?php

namespace App\Enums;

enum UserRoleEnum: string
{
    case ADMIN = 'ADMIN';
    case RESELLER = 'RESELLER';
    case USER  = 'USER';

    public static function toArray() : array {
        $arr = [];
        foreach(self::cases() as $case) {
            $arr[$case->value] = $case->name;
        }
        return $arr;
    }
}
