<?php

namespace Prymery\DeferredFunctions;

class Container extends DeferredFunctionAbstract
{
    protected const PROPERTY_CODE = 'not_show_container';

    public static function get(...$params): string
    {
        return $GLOBALS['APPLICATION']->GetProperty(static::PROPERTY_CODE) === 'Y' ?
            '' :
            '<div class="container">';
    }

    public static function getFooter(...$params): string
    {
        return $GLOBALS['APPLICATION']->GetProperty(static::PROPERTY_CODE) === 'Y' ?
            '' :
            '</div>';
    }

    public static function showHead(...$params)
    {
        return $GLOBALS['APPLICATION']->AddBufferContent([static::class, 'get'], ...$params);
    }

    public static function showFooter(...$params)
    {
        return $GLOBALS['APPLICATION']->AddBufferContent([static::class, 'getFooter'], ...$params);
    }

    static public function hideContainer()
    {
        $GLOBALS['APPLICATION']->SetPageProperty(static::PROPERTY_CODE, 'Y');
    }
}