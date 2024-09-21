<?

global $APPLICATION;

$arMenuExt = $APPLICATION->IncludeComponent(
    "bitrix:menu.sections",
    "",
    [
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "DEPTH_LEVEL" => "1",
        "DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_CODE#/",
        "IBLOCK_ID" => "4",	// Инфоблок
        "IBLOCK_TYPE" => "catalog_type",	// Тип инфоблока
        "ID" => $_REQUEST["ID"],
        "IS_SEF" => "Y",
        "SECTION_PAGE_URL" => "#SECTION_CODE#/",
        "SECTION_URL" => "",
        "SEF_BASE_URL" => "/catalog/",
    ],
    null,
    ['HIDE_ICONS' => 'Y']

);

$aMenuLinks = array_merge($aMenuLinks, $arMenuExt);