<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

use Prymery\DeferredFunctions\MainClass;
use Prymery\DeferredFunctions\Container;
use Prymery\DeferredFunctions\Title;
use Prymery\DeferredFunctions\NavChain;
use Prymery\App;

/** @var CMain $APPLICATION */

$APPLICATION->SetTitle("Корзина");

MainClass::setMainClass('basket-page');
Container::hideContainer();
Title::hideTitle();
NavChain::hideNavChain();

App::inlineCss([
    '/local/assets/local/bundle-common/bundle-common.css',
    '/local/assets/local/bundle-form/bundle-form.css',
    '/local/assets/local/bundle-basket/bundle-basket.css',
]);
App::deferredJs([
    '/local/assets/local/bundle-common/bundle-common.js',
    '/local/assets/local/bundle-basket/bundle-basket.js',
    '/local/assets/local/bundle-form/bundle-form.js',
]);
?>

    <div class="container">
        <h1 class="page__title basket__title"><? $APPLICATION->ShowTitle() ?></h1>
    </div>
    <div class="container">
        <? $APPLICATION->IncludeComponent("bitrix:sale.basket.basket", "basket", array(
            "ACTION_VARIABLE" => "basketAction",    // Название переменной действия
            "ADDITIONAL_PICT_PROP_4" => "-",    // Дополнительная картинка [Каталог]
            "ADDITIONAL_PICT_PROP_5" => "-",    // Дополнительная картинка [Торговые предложения]
            "AUTO_CALCULATION" => "Y",    // Автопересчет корзины
            "BASKET_IMAGES_SCALING" => "adaptive",    // Режим отображения изображений товаров
            "COLUMNS_LIST_EXT" => array(    // Выводимые колонки
                0 => "PREVIEW_PICTURE",
                1 => "DELETE",
                2 => "DELAY",
                3 => "SUM",
                4 => "PROPERTY_SIZE",
                5 => "PROPERTY_COUNT",
            ),
            "COLUMNS_LIST_MOBILE" => array(    // Колонки, отображаемые на мобильных устройствах
                0 => "PREVIEW_PICTURE",
                1 => "DELETE",
                2 => "DELAY",
                3 => "SUM",
                4 => "PROPERTY_SIZE",
                5 => "PROPERTY_COUNT",
            ),
            "COMPATIBLE_MODE" => "Y",    // Включить режим совместимости
            "CORRECT_RATIO" => "N",    // Автоматически рассчитывать количество товара кратное коэффициенту
            "DEFERRED_REFRESH" => "N",    // Использовать механизм отложенной актуализации данных товаров с провайдером
            "DISCOUNT_PERCENT_POSITION" => "bottom-right",
            "DISPLAY_MODE" => "extended",    // Режим отображения корзины
            "EMPTY_BASKET_HINT_PATH" => "/",    // Путь к странице для продолжения покупок
            "GIFTS_BLOCK_TITLE" => "Выберите один из подарков",
            "GIFTS_CONVERT_CURRENCY" => "N",
            "GIFTS_HIDE_BLOCK_TITLE" => "N",
            "GIFTS_HIDE_NOT_AVAILABLE" => "N",
            "GIFTS_MESS_BTN_BUY" => "Выбрать",
            "GIFTS_MESS_BTN_DETAIL" => "Подробнее",
            "GIFTS_PAGE_ELEMENT_COUNT" => "4",
            "GIFTS_PLACE" => "BOTTOM",
            "GIFTS_PRODUCT_PROPS_VARIABLE" => "prop",
            "GIFTS_PRODUCT_QUANTITY_VARIABLE" => "quantity",
            "GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
            "GIFTS_SHOW_OLD_PRICE" => "N",
            "GIFTS_TEXT_LABEL_GIFT" => "Подарок",
            "HIDE_COUPON" => "N",    // Спрятать поле ввода купона
            "LABEL_PROP" => "",    // Свойства меток товара
            "PATH_TO_ORDER" => "/order/",    // Страница оформления заказа
            "PRICE_DISPLAY_MODE" => "Y",    // Отображать цену в отдельной колонке
            "PRICE_VAT_SHOW_VALUE" => "N",    // Отображать значение НДС
            "PRODUCT_BLOCKS_ORDER" => "props,sku,columns",    // Порядок отображения блоков товара
            "QUANTITY_FLOAT" => "N",    // Использовать дробное значение количества
            "SET_TITLE" => "N",    // Устанавливать заголовок страницы
            "SHOW_DISCOUNT_PERCENT" => "N",    // Показывать процент скидки рядом с изображением
            "SHOW_FILTER" => "N",    // Отображать фильтр товаров
            "SHOW_RESTORE" => "Y",    // Разрешить восстановление удалённых товаров
            "TEMPLATE_THEME" => "",    // Цветовая тема
            "TOTAL_BLOCK_DISPLAY" => array(    // Отображение блока с общей информацией по корзине
                0 => "bottom",
            ),
            "USE_DYNAMIC_SCROLL" => "N",    // Использовать динамическую подгрузку товаров
            "USE_ENHANCED_ECOMMERCE" => "N",    // Отправлять данные электронной торговли в Google и Яндекс
            "USE_GIFTS" => "N",    // Показывать блок "Подарки"
            "USE_PREPAYMENT" => "N",    // Использовать предавторизацию для оформления заказа (PayPal Express Checkout)
            "USE_PRICE_ANIMATION" => "Y",    // Использовать анимацию цен
        ),
            false
        ); ?>
    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>