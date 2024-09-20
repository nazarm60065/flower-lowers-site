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
        'title' => $arParams['TITLE'],
        'items' => $items->map(function ($arItem) use ($hermitage) {
            $hermitage->addActions($arItem);
            $item = [
                'strMainId' => $hermitage->getEditAreaId($arItem['ID']),
                'title' => $arItem['NAME'],
                'text' => $arItem['~DETAIL_TEXT'],
            ];

            return $item;
        })
    ];
}