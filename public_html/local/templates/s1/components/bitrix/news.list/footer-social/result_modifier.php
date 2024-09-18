<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Prymery\Components\Helpers\Hermitage;

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
                'text' => $arItem['NAME'],
                'href' => $arItem['PROPERTIES']['LINK']['VALUE'] ?: '',
            ];

            if (!empty($arItem['DISPLAY_PROPERTIES']['ICON']['VALUE']) &&
                file_exists($_SERVER["DOCUMENT_ROOT"] . $arItem['DISPLAY_PROPERTIES']['ICON']['FILE_VALUE']['SRC'])) {
                $item['icon'] = file_get_contents($_SERVER["DOCUMENT_ROOT"] . $arItem['DISPLAY_PROPERTIES']['ICON']['FILE_VALUE']['SRC']);
            }

            return $item;
        })
    ];
}