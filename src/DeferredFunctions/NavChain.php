<?php

namespace Prymery\DeferredFunctions;

class NavChain extends DeferredFunctionAbstract
{
    protected const PROPERTY_CODE = 'not_show_nav_chain_custom';

    public static function get(...$params): string
    {
        return 'Y' !== $GLOBALS['APPLICATION']->GetProperty(static::PROPERTY_CODE, '')
            ? '<div class="container">' . $GLOBALS['APPLICATION']->GetNavChain(...$params) . '</div>' : '';
    }

    public static function hideNavChain()
    {
        $GLOBALS['APPLICATION']->SetPageProperty(static::PROPERTY_CODE, 'Y');
    }
}