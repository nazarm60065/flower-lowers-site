<?

/** @var CMain $APPLICATION */

global $sectionsFilter;

$sectionsFilter = [
    'UF_SHOW_ON_MAIN' => 1,
];

$APPLICATION->IncludeComponent(
    "bitrix:catalog.section.list",
    "homepage-catalog-sections",
    Array(
        "ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
        "ADD_SECTIONS_CHAIN" => "N",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "COUNT_ELEMENTS" => "N",
        "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
        "FILTER_NAME" => "sectionsFilter",
        "HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
        "IBLOCK_ID" => "4",
        "IBLOCK_TYPE" => "catalog_type",
        "SECTION_CODE" => "",
        "SECTION_FIELDS" => array("", ""),
        "SECTION_ID" => $_REQUEST["SECTION_ID"],
        "SECTION_URL" => "",
        "SECTION_USER_FIELDS" => array("UF_SHOW_ON_MAIN", "UF_WIDE"),
        "SHOW_PARENT_NAME" => "Y",
        "TOP_DEPTH" => "1",
        "VIEW_MODE" => "LINE",
        "TITLE" => "разделы каталога",
        "SUPTITLE" => "популярные",
    )
);