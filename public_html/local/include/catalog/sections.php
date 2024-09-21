<?

/** @var CMain $APPLICATION */

$APPLICATION->IncludeComponent("bitrix:menu", "catalog-sections-menu", array(
    "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
    "CHILD_MENU_TYPE" => "left",    // Тип меню для остальных уровней
    "DELAY" => "N",    // Откладывать выполнение шаблона меню
    "MAX_LEVEL" => "1",    // Уровень вложенности меню
    "MENU_CACHE_GET_VARS" => array(    // Значимые переменные запроса
        0 => "",
    ),
    "MENU_CACHE_TIME" => "3600000",    // Время кеширования (сек.)
    "MENU_CACHE_TYPE" => "A",    // Тип кеширования
    "MENU_CACHE_USE_GROUPS" => "N",    // Учитывать права доступа
    "ROOT_MENU_TYPE" => "catalog",    // Тип меню для первого уровня
    "USE_EXT" => "Y",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
),
    false
);