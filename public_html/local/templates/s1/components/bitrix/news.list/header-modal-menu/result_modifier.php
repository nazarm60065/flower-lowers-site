<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Prymery\Components\Helpers\Hermitage;
use Illuminate\Support\Collection;
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
$MIN_COL_COUNT = 7;

if ($items->isNotEmpty()) {
    $hermitage = new Hermitage($this, $arParams);
    $count = 0;
    $cols = [];

    foreach ($items as $arItem) {
        if ($count === 0) $cols[] = [];

        $count++;

        if ($arItem['PROPERTIES']['SUBLINKS']['VALUE']) {
            $count += count($arItem['PROPERTIES']['SUBLINKS']['VALUE']);
        }

        $cols[count($cols) - 1][] = $arItem;

        if ($count >= $MIN_COL_COUNT) {
            $count = 0;
        }
    }

    $arResult['context'] = [
        'allLink' => $arParams['LINK'] ? [
            'href' => $arParams['LINK'],
            'text' => $arParams['LINK_TEXT'],
        ] : null,
        'cols' => collect($cols)->map(function ($arCol) use ($hermitage) {
            return collect($arCol)->map(function ($arItem) use($hermitage) {
                $hermitage->addActions($arItem);
                $sublinks = collect($arItem['PROPERTIES']['SUBLINKS']['VALUE']);
                $sublinksDescription = collect($arItem['PROPERTIES']['SUBLINKS']['DESCRIPTION']);
                $item = [
                    'strMainId' => $hermitage->getEditAreaId($arItem['ID']),
                    'text' => $arItem['NAME'],
                    'href' => $arItem['PROPERTIES']['LINK']['VALUE'] ?: '',
                    'sublinks' => $sublinks->map(function ($text, $key) use($sublinksDescription) {
                        return [
                            'text' => $text,
                            'href' => $sublinksDescription[$key],
                            'isExternal' => SocialLinkHelper::checkHrefIsExternal($sublinksDescription[$key]),
                        ];
                    })
                ];

                return $item;
            });
        })
    ];
}