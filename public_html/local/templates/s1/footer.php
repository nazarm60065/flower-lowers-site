<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Prymery\DeferredFunctions\Container;
use Prymery\App;
use Bitrix\Main\Context;
use Bitrix\Main\Page\Asset;

/** @global CMain $APPLICATION */

if (App::IsAjax()) {
    return;
}

$needCanonical = $APPLICATION->GetDirProperty("need_canonical");
$server = Context::getCurrent()->getServer();
$asset = Asset::getInstance();

Container::showFooter();

echo '</main>';

App::Include('footer/template');

// page-inner
echo '</div>';
$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "global",
    array(
        "AREA_FILE_RECURSIVE" => "Y",
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "",
        "EDIT_TEMPLATE" => "standard.php",
        "COMPONENT_TEMPLATE" => "global",
        "PATH" => "/local/included_areas/global/global_forms.php"
    ),
    false
);

/*DeferredFunctions\Asset\DeferredStyles::show();
DeferredFunctions\Asset\DeferredJs::show();
DeferredFunctions\Asset\AsyncJs::show();*/

echo '</body></html>';