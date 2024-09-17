<?php

namespace Prymery\DeferredFunctions;

class MainClass extends DeferredFunctionAbstract
{
    private const PROPERTY_CODE = 'main_class';

    public static function get(...$params): string
    {
        return $GLOBALS['APPLICATION']->GetProperty(static::PROPERTY_CODE) ?
            ' ' . $GLOBALS['APPLICATION']->GetProperty(static::PROPERTY_CODE) :
            ' static';
    }

    static public function setMainClass($value = '')
    {
        $GLOBALS['APPLICATION']->SetPageProperty(static::PROPERTY_CODE, $value);
    }
}