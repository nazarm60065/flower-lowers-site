<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 * @var array $arParams
 * @var array $arResult
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

if ($arParams['IDS']) {
    $items = collect($arResult['ITEMS']);

    $arResult['ITEMS'] = $items->sortBy(function ($arItem) use ($arParams) {
        return array_search($arItem['ID'], $arParams['IDS']);
    });
}