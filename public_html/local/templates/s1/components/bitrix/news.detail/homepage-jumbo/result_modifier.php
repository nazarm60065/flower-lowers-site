<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Prymery\Components\Helpers\ImageResizeHelper;
use Prymery\Helpers\SocialLinkHelper;


/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */


$arResult['context'] = [];

if ($arResult['DISPLAY_PROPERTIES']['IMAGE_1']['VALUE']) {
    $arResult['context']['images'] = [];
    $hasImage2 = !!$arResult['DISPLAY_PROPERTIES']['IMAGE_2']['VALUE'];
    $size = $hasImage2 ? [
        'width' => 960,
        'height' => 1060,
    ] : [
        'width' => 1920,
        'height' => 1060,
    ];

    $arResult['context']['images'][] = ImageResizeHelper::resize($arResult['DISPLAY_PROPERTIES']['IMAGE_1']['FILE_VALUE'], $size, BX_RESIZE_IMAGE_EXACT, $arResult['NAME']);

    if ($hasImage2) {
        $arResult['context']['images'][] = ImageResizeHelper::resize($arResult['DISPLAY_PROPERTIES']['IMAGE_2']['FILE_VALUE'], $size, BX_RESIZE_IMAGE_EXACT, $arResult['NAME']);
    }
} else if ($arResult['PROPERTIES']['VIDEO_LINK']['VALUE']) {
    $poster = null;

    if ($arResult['DISPLAY_PROPERTIES']['VIDEO_POSTER']['VALUE']) {
        $poster = ImageResizeHelper::resize($arResult['DISPLAY_PROPERTIES']['VIDEO_POSTER']['FILE_VALUE'], [
            'width' => 1920,
            'height' => 1080,
        ], BX_RESIZE_IMAGE_PROPORTIONAL, $arResult['NAME']);
    }

    $arResult['context']['video'] = [
        'src' => $arResult['PROPERTIES']['VIDEO_LINK']['VALUE'],
        'poster' => $poster ? $poster['SRC'] : "",
    ];
}

if ($arResult['PROPERTIES']['LINK']['VALUE']) {
    $arResult['context']['link'] = [
        'href' => $arResult['PROPERTIES']['LINK']['VALUE'],
        'text' => $arResult['PROPERTIES']['LINK_TEXT']['VALUE'],
        'isExternal' => SocialLinkHelper::checkHrefIsExternal($arResult['PROPERTIES']['LINK']['VALUE']),
    ];
}