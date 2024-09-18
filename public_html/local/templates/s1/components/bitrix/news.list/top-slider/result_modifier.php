<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Prymery\Components\Helpers\Hermitage;
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


$items = collect($arResult['ITEMS']);

if ($items->isNotEmpty()) {
    $hermitage = new Hermitage($this, $arParams);
    $arResult['context'] = [
        'items' => $items->map(function ($arItem) use ($hermitage) {
            $hermitage->addActions($arItem);
            $item = [
                'strMainId' => $hermitage->getEditAreaId($arItem['ID']),
                'title' => $arItem['~PREVIEW_TEXT'] ?: $arItem['NAME'],
                'suptitle' => $arItem['~DETAIL_TEXT'] ?: $arItem[''],
                'link' => $arItem['PROPERTIES']['LINK']['VALUE'] ? [
                    'href' => $arItem['PROPERTIES']['LINK']['VALUE'],
                    'text' => $arItem['PROPERTIES']['LINK_TEXT']['VALUE'],
                    'isExternal' => SocialLinkHelper::checkHrefIsExternal($arItem['PROPERTIES']['LINK']['VALUE']),
                ] : null,
            ];

            if ($arItem['DISPLAY_PROPERTIES']['IMAGE_DESKTOP']['VALUE']) {
                $image = CFile::ResizeImageGet($arItem['DISPLAY_PROPERTIES']['IMAGE_DESKTOP']['VALUE'], [
                    'width' => 1920,
                    'height' => 850,
                ], BX_RESIZE_IMAGE_EXACT);

                $item['image'] = [
                    'src' => $image['src'],
                    'alt' => $arItem['NAME'],
                ];

                if ($arItem['DISPLAY_PROPERTIES']['IMAGE_TABLET']['VALUE']) {
                    $image = CFile::ResizeImageGet($arItem['DISPLAY_PROPERTIES']['IMAGE_TABLET']['VALUE'], [
                        'width' => 1280,
                        'height' => 694,
                    ], BX_RESIZE_IMAGE_EXACT);

                    $item['image']['tabletSrc'] = $image['SRC'];
                }

                if ($arItem['DISPLAY_PROPERTIES']['IMAGE_MOBILE']['VALUE']) {
                    $image = CFile::ResizeImageGet($arItem['DISPLAY_PROPERTIES']['IMAGE_MOBILE']['VALUE'], [
                        'width' => 768,
                        'height' => 416,
                    ], BX_RESIZE_IMAGE_EXACT);

                    $item['image']['mobileSrc'] = $image['SRC'];
                }
            }

            return $item;
        })
    ];
}