<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 * @var array $arParams
 * @var array $arResult
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

foreach ($arResult['ITEMS'] as $index => $item) {
    if ($item['PROPERTIES']['SIZE']['VALUE']) {
        $arResult['ITEMS'][$index]['LABEL'] = 'На фото размер ' . $item['PROPERTIES']['SIZE']['VALUE'];
    } else if ($item['PROPERTIES']['COUNT']['VALUE']) {
        $arResult['ITEMS'][$index]['LABEL'] = 'На фото ' . $item['PROPERTIES']['COUNT']['VALUE'] . ' шт.';
    }

    if ($item['OFFERS']) {
        foreach ($item['OFFERS'] as $offerIndex => $offer) {
            if ($offer['PROPERTIES']['SIZE']['VALUE']) {
                $arResult['ITEMS'][$index]['OFFERS'][$offerIndex]['LABEL'] = 'На фото размер ' . $offer['PROPERTIES']['SIZE']['VALUE'];
                $arResult['ITEMS'][$index]['JS_OFFERS'][$offerIndex]['LABEL'] = 'На фото размер ' . $offer['PROPERTIES']['SIZE']['VALUE'];
            } else if ($offer['PROPERTIES']['COUNT']['VALUE']) {
                $arResult['ITEMS'][$index]['OFFERS'][$offerIndex]['LABEL'] = 'На фото ' . $offer['PROPERTIES']['COUNT']['VALUE'] . ' шт.';
                $arResult['ITEMS'][$index]['JS_OFFERS'][$offerIndex]['LABEL'] = 'На фото ' . $offer['PROPERTIES']['COUNT']['VALUE'] . ' шт.';
            }
        }
    }
}