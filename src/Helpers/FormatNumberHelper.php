<?php

namespace Prymery\Helpers;

class FormatNumberHelper
{
    static public function formatNumber($number): string
    {
        return preg_replace('/(\d{1,3})(?=(\d{3})+$)/', '$1 ', $number);
    }

    static public function leadingZero($number): string
    {
        return $number > 9 ? $number : ('0' . $number);
    }
}