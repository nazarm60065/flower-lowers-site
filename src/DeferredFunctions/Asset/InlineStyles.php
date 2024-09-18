<?php

namespace Prymery\DeferredFunctions\Asset;

use Illuminate\Support\Collection;

class InlineStyles extends BaseAsset
{
    const MUSTACHE_TEMPLATE = 'inlineCss';
    const PROPERTY_CODE = 'inlineCss';

    static protected function prepareAssets(): Collection
    {
        $assets = parent::prepareAssets();

        return static::renderAssetsAsLine($assets);
    }

    static protected function renderAssetsAsLine($assets): Collection
    {
        return $assets->map(function ($url) {
            return file_get_contents("{$_SERVER['DOCUMENT_ROOT']}{$url}");
        });
    }
}