<?php

namespace Prymery\DeferredFunctions;

class Title extends DeferredFunctionAbstract
{
    protected const PROPERTY_CODE = 'not_show_h1';

    public static function get(...$params): string
    {
        if ('Y' === $GLOBALS['APPLICATION']->GetProperty(static::PROPERTY_CODE, '')) {
            return '';
        }

        return '<div class="container"><h1 class="page-title">' . $GLOBALS['APPLICATION']->GetTitle() . '</h1></div>';
    }

    static public function hideTitle()
    {
        $GLOBALS['APPLICATION']->SetPageProperty(static::PROPERTY_CODE, 'Y');
    }
}