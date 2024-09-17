<?php

namespace Prymery\DeferredFunctions;

abstract class DeferredFunctionAbstract
{
    abstract public static function get(...$params);

    public static function show(...$params)
    {
        return $GLOBALS['APPLICATION']->AddBufferContent([static::class, 'get'], ...$params);
    }
}