<?php

@define("ERROR_404", "Y");
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
CHTTP::SetStatus("404 Not Found");

use Prymery\DeferredFunctions\MainClass;
use Prymery\DeferredFunctions\Container;
use Prymery\DeferredFunctions\Title;
use Prymery\DeferredFunctions\NavChain;
use Prymery\App;

MainClass::setMainClass('catalog-detail');
Container::hideContainer();
Title::hideTitle();
NavChain::hideNavChain();
App::inlineCss([
    '/local/assets/local/bundle-common/bundle-common.css',
    '/local/assets/local/bundle-form/bundle-form.css',
    '/local/assets/local/bundle-catalog-detail/bundle-catalog-detail.css',
]);
App::deferredJs([
    '/local/assets/local/bundle-common/bundle-common.js',
    '/local/assets/local/bundle-catalog-detail/bundle-catalog-detail.js',
    '/local/assets/local/bundle-form/bundle-form.js',
]);
?>
    <div class="error-container container">
        <div class="error-text-container">
            <h1 class="page__title error__title">Запрошенная Вами страница не найдена</h1>
        </div>
    </div>
<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
