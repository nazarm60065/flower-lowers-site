<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 * @var array $arParams
 * @var array $arResult
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

$items = collect($arResult['ITEMS']);

if ($items->isNotEmpty()) {
    $tabs = $items->map(function ($arItem) {
        return $arItem['PROPERTIES']['GAMMA']['VALUE'];
    })->filter(function ($gamma) {
        return !!$gamma;
    })->flatten()->unique()->values();

    $tabs = $tabs->map(function ($tab, $index) {
        return [
            'id' => $index + 1,
            'tab' => $tab,
        ];
    });

    $arResult['context'] = [
        'tabs' => $tabs,
    ];

    $arResult['ITEMS'] = $items->map(function ($arItem) use ($tabs) {
        $arItem['tabs'] = '';

        if ($arItem['PROPERTIES']['GAMMA']['VALUE']) {
            $itemTabs = $tabs->filter(function ($arTab) use ($arItem) {
                return in_array($arTab['tab'], $arItem['PROPERTIES']['GAMMA']['VALUE']);
            });

            $arItem['tabs'] = implode('|', $itemTabs->pluck('id')->toArray());
        }

        return $arItem;
    })->toArray();
}

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