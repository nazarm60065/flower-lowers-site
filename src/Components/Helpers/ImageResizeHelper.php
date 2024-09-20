<?php

namespace Prymery\Components\Helpers;

use Prymery\BxMustache\Image;

class ImageResizeHelper
{
    static public function resize(array $arImage, $size = [], $resizeType = BX_RESIZE_IMAGE_EXACT, $defaultAlt = "")
    {
        $image = [];

        if ($arImage) {
            $resizedImage = static::resizeImage($arImage, $size, $resizeType);

            $image['SRC'] = $resizedImage['src'] ?: $arImage['SRC'];
            $image['WIDTH'] = $resizedImage['width'] ?: $arImage['WIDTH'];
            $image['HEIGHT'] = $resizedImage['height'] ?: $arImage['HEIGHT'];
            $image['ALT'] = $arImage['ALT'] ?: $defaultAlt;
        }

        return $image;
    }

    static protected function resizeImage(array $arImage, $size = [], $resizeType = BX_RESIZE_IMAGE_EXACT): array
    {
        if (!$arImage || !$size) return [];

        $resizedImage = \CFile::ResizeImageGet($arImage, $size, $resizeType);

        return $resizedImage ?: [];
    }
}