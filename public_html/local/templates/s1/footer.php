<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Prymery\DeferredFunctions\Container;
use Prymery\DeferredFunctions\Asset\DeferredJs;
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

DeferredJs::show();
/*DeferredFunctions\Asset\DeferredStyles::show();
DeferredFunctions\Asset\AsyncJs::show();*/

echo '</body></html>';