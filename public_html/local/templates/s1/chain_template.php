<?php


defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

/** @var array $arResult */
/** @var string $sChainProlog HTML код выводимый перед навигационной цепочкой */
/** @var string $sChainBody HTML код определяющий внешний вид одного пункта навигационной цепочки */
/** @var string $sChainEpilog HTML код выводимый после навигационной цепочки */
/** @var string $strChain HTML код всей навигационной цепочки собранный к моменту подключения шаблона */
/** @var string $TITLE заголовок очередного пункта навигационной цепочки */
/** @var string $LINK ссылка на очередном пункте навигационной цепочки */
/** @var array $arCHAIN копия массива элементов навигационной цепочки */
/** @var array $arCHAIN_LINK ссылка на массив элементов навигационной цепочки */
/** @var int $ITEM_COUNT количество элементов массива навигационной цепочки */
/** @var int $ITEM_INDEX порядковый номер очередного пункта навигационной цепочки */


global $APPLICATION;

$clickableLastEl = $APPLICATION->GetPageProperty('clickable_last_nav_chain_el');

$chains = collect($arCHAIN)
    ->take($ITEM_COUNT)
    ->map(function ($arItem, $key) use ($ITEM_INDEX, $ITEM_COUNT, $clickableLastEl) {
        $link = [];

        $link['index'] = $key + 1;
        $link['href'] = $arItem['LINK'];
        $link['text'] = $arItem['TITLE'];
        $link['isFirst'] = $arItem['LINK'] === '/';
        $link['isLast'] = !$clickableLastEl && ($key + 1) === $ITEM_COUNT;

        return $link;
    });


if ($chains->isNotEmpty()) {
    $strChain = '<nav class="breadcrumbs">';

    foreach ($chains as $chain) {
        if ($chain['isLast']) {
            $strChain .= '<span class="breadcrumbs__item breadcrumbs__item_last">
                ' . $chain['text'] . '
              </span>';
        } else {
            $strChain .= '<a href="' . $chain['href'] . '" class="breadcrumbs__item' . ($chain['isFirst'] ? ' breadcrumbs__item_first' : '') . '">
                ' . $chain['text'] . '
              </a>';
        }

    }

    $strChain .= '</nav>';
} else {
    $strChain = '';
}