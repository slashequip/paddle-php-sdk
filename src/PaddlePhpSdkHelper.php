<?php

namespace SlashEquip\PaddlePhpSdk;

class PaddlePhpSdkHelper
{
    public static function excludeNullValues(array $array): array
    {
        return array_filter($array, fn (mixed $value) => !is_null($value));
    }
}