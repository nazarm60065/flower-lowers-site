<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Prymery\Components\Helpers\ImageResizeHelper;

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 * @var array $arParams
 * @var array $arResult
 */

$arResult['GALLERY'] = [];
$size = [
    'width' => 960,
    'height' => 960,
];
$sizeMobile = [
    'width' => 560,
    'height' => 560,
];

if ($arResult['DISPLAY_PROPERTIES']['GALLERY']['VALUE']) {
    $images = is_array($arResult['DISPLAY_PROPERTIES']['GALLERY']['VALUE']) ? $arResult['DISPLAY_PROPERTIES']['GALLERY']['FILE_VALUE'] : [$arResult['DISPLAY_PROPERTIES']['GALLERY']['FILE_VALUE']];

    foreach ($images as $image) {
        $resizedImage = ImageResizeHelper::resize($image, $size);
        $resizedMobileImage = ImageResizeHelper::resize($image, $sizeMobile);

        $arResult['GALLERY'][] = [
            'realSrc' => $image['SRC'],
            'src' => $resizedImage['SRC'],
            'mobileSrc' => $resizedMobileImage['SRC'],
            'alt' => $image['ALT'],
        ];
    }
}

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

if ($arResult['PROPERTIES']['SIZE']['VALUE']) {
    $arResult['LABEL'] = 'На фото размер ' . $arResult['PROPERTIES']['SIZE']['VALUE'];
} else if ($arResult['PROPERTIES']['COUNT']['VALUE']) {
    $arResult['LABEL'] = 'На фото ' . $arResult['PROPERTIES']['COUNT']['VALUE'] . ' шт.';
}

if ($arResult['OFFERS']) {
    foreach ($arResult['OFFERS'] as $offerIndex => $offer) {
        if ($offer['PROPERTIES']['SIZE']['VALUE']) {
            $arResult['OFFERS'][$offerIndex]['LABEL'] = 'На фото размер ' . $offer['PROPERTIES']['SIZE']['VALUE'];
            $arResult['JS_OFFERS'][$offerIndex]['LABEL'] = 'На фото размер ' . $offer['PROPERTIES']['SIZE']['VALUE'];
        } else if ($offer['PROPERTIES']['COUNT']['VALUE']) {
            $arResult['OFFERS'][$offerIndex]['LABEL'] = 'На фото ' . $offer['PROPERTIES']['COUNT']['VALUE'] . ' шт.';
            $arResult['JS_OFFERS'][$offerIndex]['LABEL'] = 'На фото ' . $offer['PROPERTIES']['COUNT']['VALUE'] . ' шт.';
        }
    }
}