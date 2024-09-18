<?

use Prymery\DeferredFunctions\Container;
use Prymery\DeferredFunctions\MainClass;
use Prymery\DeferredFunctions\NavChain;
use Prymery\DeferredFunctions\Title;
use Prymery\DeferredFunctions\Asset\InlineStyles;
use Prymery\App;
use Prymery\Helpers\BxFrontendChecker;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$isMainPage = CSite::InDir('/index.php');
?>

    <!doctype html>
<html lang="<?= App::$context->getLanguage(); ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="format-detection" content="telephone=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><? App::CMain()->ShowTitle(); ?></title>
        <?
        echo InlineStyles::show();
        //echo DeferredFunctions\Asset\InlineJs::show();

        App::Include('header/favicon');

        App::CMain()->ShowMeta('robots', false);
        App::CMain()->ShowMeta('keywords', false);
        App::CMain()->ShowMeta('description', false);
        App::CMain()->ShowLink('canonical', null);

        if ((new BxFrontendChecker())->needAddFrontend()) {
            App::CMain()->ShowHead();
            App::CMain()->SetPageProperty('needBxStyles', 'Y');
        } ?>
        <style>
          .page #bx-panel {
            position: relative !important;
            width: 100% !important;
            top: 0;
          }
        </style>
    </head>
<body class="page">
    <div class="fixed-panel">
        <? App::CMain()->ShowPanel(); ?>
    </div>
<div class="page-inner">
<? App::Include('header/template'); ?>
<main class="main<? MainClass::show() ?>">
<?
NavChain::show();
Title::show();
Container::showHead();
?>