<?php

namespace App\Constants;

final class CountryCodes
{
    const MOZAMBIQUE_CODE = 258;
    const CAMEROON_CODE = 237;
    const MOROCCO_CODE = 212;
    const UGANDA_CODE = 256;
    const ETHIOPIA_CODE = 251;

    public static $countries = [
        self::CAMEROON_CODE => 'Cameron',
        self::MOROCCO_CODE => 'Morocco',
        self::MOZAMBIQUE_CODE => 'Mozambique',
        self::UGANDA_CODE => 'Uganda',
        self::ETHIOPIA_CODE => 'Ethiopia',
    ];

    public static $countriesRegex = [
        self::CAMEROON_CODE => '/\(237\)\ ?[2368]\d{7,8}$/',
        self::MOROCCO_CODE => '/\(212\)\ ?[5-9]\d{8}$/',
        self::MOZAMBIQUE_CODE => '/\(258\)\ ?[28]\d{7,8}$/',
        self::UGANDA_CODE => '/\(256\)\ ?\d{9}$/',
        self::ETHIOPIA_CODE => '/\(251\)\ ?[1-59]\d{8}$/',
    ];
}
