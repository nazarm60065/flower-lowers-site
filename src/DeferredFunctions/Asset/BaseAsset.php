<?php

namespace Prymery\DeferredFunctions\Asset;

use Illuminate\Support\Collection;
use Prymery\DeferredFunctions\DeferredFunctionAbstract;

class BaseAsset extends DeferredFunctionAbstract
{
    const PROPERTY_CODE = '';
    const MUSTACHE_TEMPLATE = '';

    public static function get(...$params): string
    {
        if (!static::PROPERTY_CODE
            || !static::MUSTACHE_TEMPLATE
            || !$GLOBALS['APPLICATION']->GetProperty(static::PROPERTY_CODE, '')
        ) return '';

        $mustache = new \Mustache_Engine([
            'loader' => new \Mustache_Loader_FilesystemLoader(__DIR__ . '/templates')
        ]);
        $assets = static::prepareAssets();

        return $mustache->render(static::MUSTACHE_TEMPLATE, ['items' => $assets]);
    }

    protected static function prepareAssets(): Collection
    {
        if ($propertyValue = $GLOBALS['APPLICATION']->GetProperty(static::PROPERTY_CODE)) {
            return collect(explode(';', $propertyValue))->filter(function ($url) {
                return file_exists($_SERVER['DOCUMENT_ROOT'] . $url);
            })->values();
        }

        return new Collection;
    }
}