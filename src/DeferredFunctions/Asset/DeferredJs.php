<?php

namespace Prymery\DeferredFunctions\Asset;

use Illuminate\Support\Collection;

class DeferredJs extends BaseAsset
{
    const MUSTACHE_TEMPLATE = 'deferredJs';
    const PROPERTY_CODE = 'deferredJs';

    static protected function prepareAssets(): Collection
    {
        $assets = parent::prepareAssets();

        return $assets->map(function ($url) {
            return ['url' => $url];
        });
    }
}