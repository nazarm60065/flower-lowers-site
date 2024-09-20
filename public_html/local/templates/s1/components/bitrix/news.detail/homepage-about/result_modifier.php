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


$arResult['context'] = [
    'title' => $arResult['NAME'],
    'text' => $arResult['~PREVIEW_TEXT'],
    'suptitle' => $arResult['PROPERTIES']['SUPTITLE']['VALUE'],
];

if ($arResult['PREVIEW_PICTURE']) {
    $size = [
        'width' => 960,
        'height' => 800,
    ];

    $arResult['context']['image'] = ImageResizeHelper::resize($arResult['PREVIEW_PICTURE'], $size, BX_RESIZE_IMAGE_EXACT, $arResult['NAME']);
}

if ($arResult['PROPERTIES']['LINK']['VALUE']) {
    $arResult['context']['link'] = [
        'href' => $arResult['PROPERTIES']['LINK']['VALUE'],
        'text' => $arResult['PROPERTIES']['LINK_TEXT']['VALUE'],
        'isExternal' => SocialLinkHelper::checkHrefIsExternal($arResult['PROPERTIES']['LINK']['VALUE']),
    ];
}