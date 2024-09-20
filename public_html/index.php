<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

use Prymery\DeferredFunctions\MainClass;
use Prymery\DeferredFunctions\Container;
use Prymery\DeferredFunctions\Title;
use Prymery\DeferredFunctions\NavChain;
use Prymery\App;

/** @var CMain $APPLICATION */

$APPLICATION->SetTitle("Flowers Lovers");

MainClass::setMainClass('homepage');
Container::hideContainer();
Title::hideTitle();
NavChain::hideNavChain();
App::inlineCss([
    '/local/assets/local/bundle-common/bundle-common.css',
    '/local/assets/local/bundle-form/bundle-form.css',
    '/local/assets/local/bundle-homepage/bundle-homepage.css',
]);
App::deferredJs([
    '/local/assets/local/bundle-common/bundle-common.js',
    '/local/assets/local/bundle-homepage/bundle-homepage.js',
    '/local/assets/local/bundle-form/bundle-form.js',
]);
?>

<? App::Include('homepage/top-slider') ?>
<? App::Include('homepage/selection') ?>
<? App::Include('homepage/jumbo') ?>
<? App::Include('homepage/catalog-sections') ?>
<? App::Include('homepage/gamma') ?>
<? App::Include('homepage/about') ?>
<? App::Include('homepage/features', true, [], false) ?>
<? App::Include('homepage/faq') ?>
<? App::Include('viewed') ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>