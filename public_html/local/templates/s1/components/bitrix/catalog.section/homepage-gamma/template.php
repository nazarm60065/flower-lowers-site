<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Catalog\ProductTable;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 *
 *  _________________________________________________________________________
 * |    Attention!
 * |    The following comments are for system use
 * |    and are required for the component to work correctly in ajax mode:
 * |    <!-- items-container -->
 * |    <!-- pagination-container -->
 * |    <!-- component-end -->
 */

$this->setFrameMode(true);

if (!empty($arResult['NAV_RESULT'])) {
    $navParams = array(
        'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
        'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
        'NavNum' => $arResult['NAV_RESULT']->NavNum
    );
} else {
    $navParams = array(
        'NavPageCount' => 1,
        'NavPageNomer' => 1,
        'NavNum' => $this->randString()
    );
}

$showTopPager = false;
$showBottomPager = false;
$showLazyLoad = false;

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1) {
    $showTopPager = $arParams['DISPLAY_TOP_PAGER'];
    $showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
    $showLazyLoad = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}

$templateLibrary = array('popup', 'ajax', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES'])) {
    $templateLibrary[] = 'currency';
    $currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
    'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
    'TEMPLATE_LIBRARY' => $templateLibrary,
    'CURRENCIES' => $currencyList,
    'USE_PAGINATION_CONTAINER' => $showTopPager || $showBottomPager,
);
unset($currencyList, $templateLibrary);

$elementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$elementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$elementDeleteParams = array('CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

$positionClassMap = array(
    'left' => 'product-item-label-left',
    'center' => 'product-item-label-center',
    'right' => 'product-item-label-right',
    'bottom' => 'product-item-label-bottom',
    'middle' => 'product-item-label-middle',
    'top' => 'product-item-label-top'
);

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION'])) {
    foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos) {
        $discountPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
    }
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION'])) {
    foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos) {
        $labelPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
    }
}

$arParams['~MESS_BTN_BUY'] = ($arParams['~MESS_BTN_BUY'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_BUY');
$arParams['~MESS_BTN_DETAIL'] = ($arParams['~MESS_BTN_DETAIL'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_DETAIL');
$arParams['~MESS_BTN_COMPARE'] = ($arParams['~MESS_BTN_COMPARE'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_COMPARE');
$arParams['~MESS_BTN_SUBSCRIBE'] = ($arParams['~MESS_BTN_SUBSCRIBE'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_SUBSCRIBE');
$arParams['~MESS_BTN_ADD_TO_BASKET'] = ($arParams['~MESS_BTN_ADD_TO_BASKET'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET');
$arParams['~MESS_NOT_AVAILABLE'] = ($arParams['~MESS_NOT_AVAILABLE'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE');
$arParams['~MESS_NOT_AVAILABLE_SERVICE'] = ($arParams['~MESS_NOT_AVAILABLE_SERVICE'] ?? '') ?: Loc::getMessage('CP_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE_SERVICE');
$arParams['~MESS_SHOW_MAX_QUANTITY'] = ($arParams['~MESS_SHOW_MAX_QUANTITY'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_SHOW_MAX_QUANTITY');
$arParams['~MESS_RELATIVE_QUANTITY_MANY'] = ($arParams['~MESS_RELATIVE_QUANTITY_MANY'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = ($arParams['MESS_RELATIVE_QUANTITY_MANY'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['~MESS_RELATIVE_QUANTITY_FEW'] = ($arParams['~MESS_RELATIVE_QUANTITY_FEW'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = ($arParams['MESS_RELATIVE_QUANTITY_FEW'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');

$arParams['MESS_BTN_LAZY_LOAD'] = $arParams['MESS_BTN_LAZY_LOAD'] ?: Loc::getMessage('CT_BCS_CATALOG_MESS_BTN_LAZY_LOAD');

$obName = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
$containerName = 'container-' . $navParams['NavNum'];

if ($showTopPager) {
    ?>
    <div data-pagination-num="<?= $navParams['NavNum'] ?>">
        <!-- pagination-container -->
        <?= $arResult['NAV_STRING'] ?>
        <!-- pagination-container -->
    </div>
    <?
}

if (!isset($arParams['HIDE_SECTION_DESCRIPTION']) || $arParams['HIDE_SECTION_DESCRIPTION'] !== 'Y') {
    ?>
    <div class="bx-section-desc bx-<?= $arParams['TEMPLATE_THEME'] ?>">
        <p class="bx-section-desc-post"><?= $arResult['DESCRIPTION'] ?? '' ?></p>
    </div>
    <?
}
?>

<?
if (!empty($arResult['ITEMS'])) :?>
    <section class="homepage-collection">
        <div class="container homepage-collection-container">
            <? if ($arParams['TITLE']) : ?>
                <div class="homepage-collection-top">
                    <div class="homepage__title homepage-collection__title"><?= $arParams['TITLE'] ?></div>
                </div>
            <? endif; ?>
            <? if ($arResult['context'] && $arResult['context']['tabs']) : ?>
                <div class="swiper homepage-collection-tabs">
                    <button
                            class="homepage-collection-tabs__arrow homepage-collection-tabs__arrow_prev slider__arrow slider__arrow_prev"
                            type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 576 1024">
                            <path fill="none" stroke="#d2b9ae" stroke-linecap="round" stroke-miterlimit="10"
                                  stroke-width="64"
                                  d="M541.76 963.968 100.672 530.24c-4.243-4.122-6.875-9.882-6.875-16.256s2.633-12.134 6.87-16.251l.005-.005L541.76 64"/>
                        </svg>
                    </button>
                    <div class="swiper-wrapper">
                        <? foreach ($arResult['context']['tabs'] as $index => $tab): ?>
                            <div class="swiper-slide homepage-collection-tab<?= ($index === 0) ? ' homepage-collection-tab_active' : '' ?>"
                                 data-index="<?= $index ?>"
                                 data-tab="<?= $tab['id'] ?>">
                                <button class="homepage-collection-tab__button"
                                        type="button"><?= $tab['tab'] ?></button>
                            </div>
                        <? endforeach; ?>
                    </div>
                    <button
                            class="homepage-collection-tabs__arrow homepage-collection-tabs__arrow_next slider__arrow slider__arrow_next"
                            type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" fill="none" viewBox="0 0 9 16">
                            <path stroke="#D2B9AE" stroke-linecap="round" stroke-miterlimit="10"
                                  d="m.535 15.062 6.892-6.777a.354.354 0 0 0 0-.508L.535 1"/>
                        </svg>
                    </button>
                </div>
            <? endif; ?>
            <div class="swiper homepage-catalog-slider homepage-collection-slider">
                <div class="swiper-wrapper">
                    <? $generalParams = [
                        'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
                        'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
                        'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
                        'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
                        'MESS_SHOW_MAX_QUANTITY' => $arParams['~MESS_SHOW_MAX_QUANTITY'],
                        'MESS_RELATIVE_QUANTITY_MANY' => $arParams['~MESS_RELATIVE_QUANTITY_MANY'],
                        'MESS_RELATIVE_QUANTITY_FEW' => $arParams['~MESS_RELATIVE_QUANTITY_FEW'],
                        'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
                        'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
                        'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
                        'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
                        'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
                        'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
                        'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'],
                        'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
                        'COMPARE_PATH' => $arParams['COMPARE_PATH'],
                        'COMPARE_NAME' => $arParams['COMPARE_NAME'],
                        'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
                        'PRODUCT_BLOCKS_ORDER' => $arParams['PRODUCT_BLOCKS_ORDER'],
                        'LABEL_POSITION_CLASS' => $labelPositionClass,
                        'DISCOUNT_POSITION_CLASS' => $discountPositionClass,
                        'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
                        'SLIDER_PROGRESS' => $arParams['SLIDER_PROGRESS'],
                        '~BASKET_URL' => $arParams['~BASKET_URL'],
                        '~ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
                        '~BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
                        '~COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
                        '~COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
                        'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
                        'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
                        'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
                        'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY'],
                        'MESS_BTN_BUY' => $arParams['~MESS_BTN_BUY'],
                        'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
                        'MESS_BTN_COMPARE' => $arParams['~MESS_BTN_COMPARE'],
                        'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
                        'MESS_BTN_ADD_TO_BASKET' => $arParams['~MESS_BTN_ADD_TO_BASKET'],
                        'ADDITIONAL_CSS_CLASS' => $arParams['ADDITIONAL_CSS_CLASS'],
                    ];

                    $areaIds = [];
                    $itemParameters = [];

                    foreach ($arResult['ITEMS'] as $item) {
                        $uniqueId = $item['ID'] . '_' . md5($this->randString() . $component->getAction());
                        $areaIds[$item['ID']] = $this->GetEditAreaId($uniqueId);
                        $this->AddEditAction($uniqueId, $item['EDIT_LINK'], $elementEdit);
                        $this->AddDeleteAction($uniqueId, $item['DELETE_LINK'], $elementDelete, $elementDeleteParams);

                        $itemParameters[$item['ID']] = [
                            'SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']],
                            'MESS_NOT_AVAILABLE' => ($arResult['MODULES']['catalog'] && $item['PRODUCT']['TYPE'] === ProductTable::TYPE_SERVICE
                                ? $arParams['~MESS_NOT_AVAILABLE_SERVICE']
                                : $arParams['~MESS_NOT_AVAILABLE']
                            ),
                        ];

                        $APPLICATION->IncludeComponent(
                            'bitrix:catalog.item',
                            'catalog-card',
                            array(
                                'RESULT' => array(
                                    'ITEM' => $item,
                                    'AREA_ID' => $areaIds[$item['ID']],
                                    'TYPE' => "card",
                                    'BIG_LABEL' => 'N',
                                    'BIG_DISCOUNT_PERCENT' => 'N',
                                    'BIG_BUTTONS' => 'N',
                                    'SCALABLE' => 'N'
                                ),
                                'PARAMS' => $generalParams + $itemParameters[$item['ID']],
                            ),
                            $component,
                            array('HIDE_ICONS' => 'Y')
                        );

                    }
                    ?>
                    <!-- items-container -->
                    <?

                    unset($itemParameters);
                    unset($areaIds);

                    unset($generalParams);
                    ?>
                </div>
            </div>
            <? if ($arParams['LINK']): ?>
                <div class="homepage-collection-button-container">
                    <a href="<?= $arParams['LINK'] ?>"
                       class="button button_filled-pink homepage-collection__button"><?= $arParams['LINK_TEXT'] ?></a>
                </div>
            <? endif; ?>
        </div>
    </section>
    <!-- items-container -->
<? endif; ?>

<?
if ($showLazyLoad) {
    ?>
    <div class="row bx-<?= $arParams['TEMPLATE_THEME'] ?>">
        <div class="btn btn-default btn-lg center-block" style="margin: 15px;"
             data-use="show-more-<?= $navParams['NavNum'] ?>">
            <?= $arParams['MESS_BTN_LAZY_LOAD'] ?>
        </div>
    </div>
    <?
}

if ($showBottomPager) {
    ?>
    <div data-pagination-num="<?= $navParams['NavNum'] ?>">
        <!-- pagination-container -->
        <?= $arResult['NAV_STRING'] ?>
        <!-- pagination-container -->
    </div>
    <?
}

$signer = new \Bitrix\Main\Security\Sign\Signer;
$signedTemplate = $signer->sign($templateName, 'catalog.section');
$signedParams = $signer->sign(base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])), 'catalog.section');
?>
<script>
  BX.message({
    BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
    BASKET_URL: '<?=$arParams['BASKET_URL']?>',
    ADD_TO_BASKET_OK: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
    TITLE_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR')?>',
    TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS')?>',
    TITLE_SUCCESSFUL: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
    BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR')?>',
    BTN_MESSAGE_SEND_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS')?>',
    BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE')?>',
    BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
    COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK')?>',
    COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
    COMPARE_TITLE: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE')?>',
    PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCS_CATALOG_PRICE_TOTAL_PREFIX')?>',
    RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
    RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
    BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
    BTN_MESSAGE_LAZY_LOAD: '<?=CUtil::JSEscape($arParams['MESS_BTN_LAZY_LOAD'])?>',
    BTN_MESSAGE_LAZY_LOAD_WAITER: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_LAZY_LOAD_WAITER')?>',
    SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
  });
  var <?=$obName?> = new JCCatalogSectionComponent({
    siteId: '<?=CUtil::JSEscape($component->getSiteId())?>',
    componentPath: '<?=CUtil::JSEscape($componentPath)?>',
    navParams: <?=CUtil::PhpToJSObject($navParams)?>,
    deferredLoad: false, // enable it for deferred load
    initiallyShowHeader: '<?=!empty($arResult['ITEM_ROWS'])?>',
    bigData: <?=CUtil::PhpToJSObject($arResult['BIG_DATA'])?>,
    lazyLoad: !!'<?=$showLazyLoad?>',
    loadOnScroll: !!'<?=($arParams['LOAD_ON_SCROLL'] === 'Y')?>',
    template: '<?=CUtil::JSEscape($signedTemplate)?>',
    ajaxId: '<?=CUtil::JSEscape($arParams['AJAX_ID'] ?? '')?>',
    parameters: '<?=CUtil::JSEscape($signedParams)?>',
    container: '<?=$containerName?>'
  });
</script>
<!-- component-end -->
