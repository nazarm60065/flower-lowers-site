<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;
use Prymery\Components\Helpers\ImageResizeHelper;
use Prymery\Helpers\FormatNumberHelper;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var string $discountPositionClass
 * @var string $labelPositionClass
 * @var CatalogSectionComponent $component
 */

if ($item['PREVIEW_PICTURE']) {
    $item['PREVIEW_PICTURE'] = ImageResizeHelper::resize($item['PREVIEW_PICTURE'], [
        'width' => 390,
        'height' => 390,
    ], BX_RESIZE_IMAGE_EXACT, $item['NAME']);
}

if ($item['PREVIEW_PICTURE_SECOND']) {
    $item['PREVIEW_PICTURE_SECOND'] = ImageResizeHelper::resize($item['PREVIEW_PICTURE_SECOND'], [
        'width' => 390,
        'height' => 390,
    ], BX_RESIZE_IMAGE_EXACT, $item['NAME']);
}

$bgImage = !empty($item['PREVIEW_PICTURE_SECOND']) ? $item['PREVIEW_PICTURE_SECOND']['SRC'] : "";
?>

<div class="catalog-card-image-wrapper" data-entity="image-wrapper">
    <div class="catalog-card-image-inner catalog-card-image-inner_active"<? if (!$item['PREVIEW_PICTURE']) : ?> style="display: none;" <?endif;?>>
        <img src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $item['PREVIEW_PICTURE']['ALT'] ?>"
             id="<?= $itemIds['PICT'] ?>"
             class="catalog-card-image__img" loading="lazy">
    </div>
    <div class="catalog-card-image-inner catalog-card-image-inner_back"<? if (!$bgImage) : ?> style="display: none;" <?endif;?>>
        <img src="<?= $bgImage ?>" alt="<?= $item['PREVIEW_PICTURE']['ALT'] ?>"
             id="<?= $itemIds['SECOND_PICT'] ?>"
             class="catalog-card-image__img" loading="lazy">
    </div>
</div>
<div class="catalog-card-content">
    <div class="catalog-card__title"><?= $productTitle ?></div>
    <?
    if (!empty($arParams['PRODUCT_BLOCKS_ORDER'])) {
        foreach ($arParams['PRODUCT_BLOCKS_ORDER'] as $blockName) {
            switch ($blockName) {
                case 'price': ?>
                    <div class="catalog-card-price" data-entity="price-block">
                        <? if (!empty($price)) : ?>
                            <div class="catalog-card-price-base">
                                <span class="catalog-card-price__value"
                                      id="<?= $itemIds['PRICE'] ?>"><?= FormatNumberHelper::formatNumber($price['RATIO_PRICE']) ?></span><span
                                        class="catalog-card-price__currency">₽</span>
                            </div>
                        <? endif; ?>
                        <?
                        if ($arParams['SHOW_OLD_PRICE'] === 'Y') {
                            ?>
                            <div class="catalog-card-price-old"
                                <?= ($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '') ?>>
                                <span class="catalog-card-price__value"
                                      id="<?= $itemIds['PRICE_OLD'] ?>"><?= FormatNumberHelper::formatNumber($price['BASE_PRICE']) ?></span><span
                                        class="catalog-card-price__currency">₽</span>
                            </div>&nbsp;
                            <?
                        }
                        ?>
                    </div>
                    <?
                    break;

                case 'quantityLimit':
                    if ($arParams['SHOW_MAX_QUANTITY'] !== 'N') {
                        if ($haveOffers) {
                            if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y') {
                                ?>
                                <div class="product-item-info-container product-item-hidden"
                                     id="<?= $itemIds['QUANTITY_LIMIT'] ?>"
                                     style="display: none;" data-entity="quantity-limit-block">
                                    <div class="product-item-info-container-title">
                                        <?= $arParams['MESS_SHOW_MAX_QUANTITY'] ?>:
                                        <span class="product-item-quantity" data-entity="quantity-limit-value"></span>
                                    </div>
                                </div>
                                <?
                            }
                        } else {
                            if (
                                $measureRatio
                                && (float)$actualItem['CATALOG_QUANTITY'] > 0
                                && $actualItem['CATALOG_QUANTITY_TRACE'] === 'Y'
                                && $actualItem['CATALOG_CAN_BUY_ZERO'] === 'N'
                            ) {
                                ?>
                                <div class="product-item-info-container product-item-hidden"
                                     id="<?= $itemIds['QUANTITY_LIMIT'] ?>">
                                    <div class="product-item-info-container-title">
                                        <?= $arParams['MESS_SHOW_MAX_QUANTITY'] ?>:
                                        <span class="product-item-quantity">
											<?
                                            if ($arParams['SHOW_MAX_QUANTITY'] === 'M') {
                                                if ((float)$actualItem['CATALOG_QUANTITY'] / $measureRatio >= $arParams['RELATIVE_QUANTITY_FACTOR']) {
                                                    echo $arParams['MESS_RELATIVE_QUANTITY_MANY'];
                                                } else {
                                                    echo $arParams['MESS_RELATIVE_QUANTITY_FEW'];
                                                }
                                            } else {
                                                echo $actualItem['CATALOG_QUANTITY'] . ' ' . $actualItem['ITEM_MEASURE']['TITLE'];
                                            }
                                            ?>
										</span>
                                    </div>
                                </div>
                                <?
                            }
                        }
                    }

                    break;

                case 'quantity':
                    if (!$haveOffers) {
                        if ($actualItem['CAN_BUY'] && $arParams['USE_PRODUCT_QUANTITY']) {
                            ?>
                            <div class="product-item-info-container product-item-hidden" data-entity="quantity-block">
                                <div class="product-item-amount">
                                    <div class="product-item-amount-field-container">
                                        <span class="product-item-amount-field-btn-minus no-select"
                                              id="<?= $itemIds['QUANTITY_DOWN'] ?>"></span>
                                        <input class="product-item-amount-field" id="<?= $itemIds['QUANTITY'] ?>"
                                               type="number"
                                               name="<?= $arParams['PRODUCT_QUANTITY_VARIABLE'] ?>"
                                               value="<?= $measureRatio ?>">
                                        <span class="product-item-amount-field-btn-plus no-select"
                                              id="<?= $itemIds['QUANTITY_UP'] ?>"></span>
                                        <span class="product-item-amount-description-container">
											<span id="<?= $itemIds['QUANTITY_MEASURE'] ?>">
												<?= $actualItem['ITEM_MEASURE']['TITLE'] ?>
											</span>
											<span id="<?= $itemIds['PRICE_TOTAL'] ?>"></span>
										</span>
                                    </div>
                                </div>
                            </div>
                            <?
                        }
                    } elseif ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y') {
                        if ($arParams['USE_PRODUCT_QUANTITY']) {
                            ?>
                            <div class="product-item-info-container product-item-hidden" data-entity="quantity-block">
                                <div class="product-item-amount">
                                    <div class="product-item-amount-field-container">
                                        <span class="product-item-amount-field-btn-minus no-select"
                                              id="<?= $itemIds['QUANTITY_DOWN'] ?>"></span>
                                        <input class="product-item-amount-field" id="<?= $itemIds['QUANTITY'] ?>"
                                               type="number"
                                               name="<?= $arParams['PRODUCT_QUANTITY_VARIABLE'] ?>"
                                               value="<?= $measureRatio ?>">
                                        <span class="product-item-amount-field-btn-plus no-select"
                                              id="<?= $itemIds['QUANTITY_UP'] ?>"></span>
                                        <span class="product-item-amount-description-container">
											<span id="<?= $itemIds['QUANTITY_MEASURE'] ?>"><?= $actualItem['ITEM_MEASURE']['TITLE'] ?></span>
											<span id="<?= $itemIds['PRICE_TOTAL'] ?>"></span>
										</span>
                                    </div>
                                </div>
                            </div>
                            <?
                        }
                    }

                    break;

                case 'buttons':
                    ?>
                    <div class="product-item-info-container product-item-hidden" data-entity="buttons-block">
                        <?
                        if (!$haveOffers) {
                            if ($actualItem['CAN_BUY']) {
                                ?>
                                <div class="catalog-card-button-container" id="<?= $itemIds['BASKET_ACTIONS'] ?>">
                                    <button class="button button_linear catalog-card__to-cart" type="button"
                                            id="<?= $itemIds['BUY_LINK'] ?>">
                                        <?= ($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET']) ?>
                                    </button>
                                </div>
                                <?
                            } else {
                                ?>
                                <div class="catalog-card-button-container">
                                    <?
                                    if ($showSubscribe) {
                                        $APPLICATION->IncludeComponent(
                                            'bitrix:catalog.product.subscribe',
                                            '',
                                            array(
                                                'PRODUCT_ID' => $actualItem['ID'],
                                                'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
                                                'BUTTON_CLASS' => 'btn btn-default ' . $buttonSizeClass,
                                                'DEFAULT_DISPLAY' => true,
                                                'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
                                            ),
                                            $component,
                                            array('HIDE_ICONS' => 'Y')
                                        );
                                    }
                                    ?>
                                    <button class="button button_linear catalog-card__to-cart" type="button"
                                            id="<?= $itemIds['NOT_AVAILABLE_MESS'] ?>">
                                        <?= $arParams['MESS_NOT_AVAILABLE'] ?>
                                    </button>
                                </div>
                                <?
                            }
                        } else {
                            if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y') {
                                ?>
                                <div class="catalog-card-button-container">
                                    <?
                                    if ($showSubscribe) {
                                        $APPLICATION->IncludeComponent(
                                            'bitrix:catalog.product.subscribe',
                                            '',
                                            array(
                                                'PRODUCT_ID' => $item['ID'],
                                                'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
                                                'BUTTON_CLASS' => 'btn btn-default ' . $buttonSizeClass,
                                                'DEFAULT_DISPLAY' => !$actualItem['CAN_BUY'],
                                                'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
                                            ),
                                            $component,
                                            array('HIDE_ICONS' => 'Y')
                                        );
                                    }
                                    ?>
                                    <button class="button button_linear catalog-card__to-cart" type="button"
                                            id="<?= $itemIds['NOT_AVAILABLE_MESS'] ?>"
                                        <?= ($actualItem['CAN_BUY'] ? 'style="display: none;"' : '') ?>>
                                        <?= $arParams['MESS_NOT_AVAILABLE'] ?>
                                    </button>
                                    <div id="<?= $itemIds['BASKET_ACTIONS'] ?>" <?= ($actualItem['CAN_BUY'] ? '' : 'style="display: none;"') ?>>
                                        <button class="button button_linear catalog-card__to-cart" type="button"
                                                id="<?= $itemIds['BUY_LINK'] ?>">
                                            <?= ($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET']) ?>
                                        </button>
                                    </div>
                                </div>
                                <?
                            } else {
                                ?>
                                <div class="catalog-card-button-container">
                                    <a class="button button_linear catalog-card__to-cart"
                                       href="<?= $item['DETAIL_PAGE_URL'] ?>">
                                        <?= $arParams['MESS_BTN_DETAIL'] ?>
                                    </a>
                                </div>
                                <?
                            }
                        }
                        ?>
                    </div>
                    <?
                    break;

                case 'props':
                    if (false) {
                        if (!$haveOffers) {
                            if (!empty($item['DISPLAY_PROPERTIES'])) {
                                ?>
                                <div class="product-item-info-container product-item-hidden" data-entity="props-block">
                                    <dl class="product-item-properties">
                                        <?
                                        foreach ($item['DISPLAY_PROPERTIES'] as $code => $displayProperty) {
                                            ?>
                                            <dt<?= (!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' class="hidden-xs"' : '') ?>>
                                                <?= $displayProperty['NAME'] ?>
                                            </dt>
                                            <dd<?= (!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' class="hidden-xs"' : '') ?>>
                                                <?= (is_array($displayProperty['DISPLAY_VALUE'])
                                                    ? implode(' / ', $displayProperty['DISPLAY_VALUE'])
                                                    : $displayProperty['DISPLAY_VALUE']) ?>
                                            </dd>
                                            <?
                                        }
                                        ?>
                                    </dl>
                                </div>
                                <?
                            }

                            if ($arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !empty($item['PRODUCT_PROPERTIES'])) {
                                ?>
                                <div id="<?= $itemIds['BASKET_PROP_DIV'] ?>" style="display: none;">
                                    <?
                                    if (!empty($item['PRODUCT_PROPERTIES_FILL'])) {
                                        foreach ($item['PRODUCT_PROPERTIES_FILL'] as $propID => $propInfo) {
                                            ?>
                                            <input type="hidden"
                                                   name="<?= $arParams['PRODUCT_PROPS_VARIABLE'] ?>[<?= $propID ?>]"
                                                   value="<?= htmlspecialcharsbx($propInfo['ID']) ?>">
                                            <?
                                            unset($item['PRODUCT_PROPERTIES'][$propID]);
                                        }
                                    }

                                    if (!empty($item['PRODUCT_PROPERTIES'])) {
                                        ?>
                                        <table>
                                            <?
                                            foreach ($item['PRODUCT_PROPERTIES'] as $propID => $propInfo) {
                                                ?>
                                                <tr>
                                                    <td><?= $item['PROPERTIES'][$propID]['NAME'] ?></td>
                                                    <td>
                                                        <?
                                                        if (
                                                            $item['PROPERTIES'][$propID]['PROPERTY_TYPE'] === 'L'
                                                            && $item['PROPERTIES'][$propID]['LIST_TYPE'] === 'C'
                                                        ) {
                                                            foreach ($propInfo['VALUES'] as $valueID => $value) {
                                                                ?>
                                                                <label>
                                                                    <? $checked = $valueID === $propInfo['SELECTED'] ? 'checked' : ''; ?>
                                                                    <input type="radio"
                                                                           name="<?= $arParams['PRODUCT_PROPS_VARIABLE'] ?>[<?= $propID ?>]"
                                                                           value="<?= $valueID ?>" <?= $checked ?>>
                                                                    <?= $value ?>
                                                                </label>
                                                                <br/>
                                                                <?
                                                            }
                                                        } else {
                                                            ?>
                                                            <select name="<?= $arParams['PRODUCT_PROPS_VARIABLE'] ?>[<?= $propID ?>]">
                                                                <?
                                                                foreach ($propInfo['VALUES'] as $valueID => $value) {
                                                                    $selected = $valueID === $propInfo['SELECTED'] ? 'selected' : '';
                                                                    ?>
                                                                    <option value="<?= $valueID ?>" <?= $selected ?>>
                                                                        <?= $value ?>
                                                                    </option>
                                                                    <?
                                                                }
                                                                ?>
                                                            </select>
                                                            <?
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?
                                            }
                                            ?>
                                        </table>
                                        <?
                                    }
                                    ?>
                                </div>
                                <?
                            }
                        } else {
                            $showProductProps = !empty($item['DISPLAY_PROPERTIES']);
                            $showOfferProps = $arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $item['OFFERS_PROPS_DISPLAY'];

                            if ($showProductProps || $showOfferProps) {
                                ?>
                                <div class="product-item-info-container product-item-hidden" data-entity="props-block">
                                    <dl class="product-item-properties">
                                        <?
                                        if ($showProductProps) {
                                            foreach ($item['DISPLAY_PROPERTIES'] as $code => $displayProperty) {
                                                ?>
                                                <dt<?= (!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' class="hidden-xs"' : '') ?>>
                                                    <?= $displayProperty['NAME'] ?>
                                                </dt>
                                                <dd<?= (!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' class="hidden-xs"' : '') ?>>
                                                    <?= (is_array($displayProperty['DISPLAY_VALUE'])
                                                        ? implode(' / ', $displayProperty['DISPLAY_VALUE'])
                                                        : $displayProperty['DISPLAY_VALUE']) ?>
                                                </dd>
                                                <?
                                            }
                                        }

                                        if ($showOfferProps) {
                                            ?>
                                            <span id="<?= $itemIds['DISPLAY_PROP_DIV'] ?>" style="display: none;"></span>
                                            <?
                                        }
                                        ?>
                                    </dl>
                                </div>
                                <?
                            }
                        }
                    }


                    break;

                case 'sku':
                    if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $haveOffers && !empty($item['OFFERS_PROP'])) {
                        ?>
                        <div id="<?= $itemIds['PROP_DIV'] ?>">
                            <?
                            foreach ($arParams['SKU_PROPS'] as $skuProperty) {
                                $propertyId = $skuProperty['ID'];
                                $skuProperty['NAME'] = htmlspecialcharsbx($skuProperty['NAME']);
                                if (!isset($item['SKU_TREE_VALUES'][$propertyId]))
                                    continue;
                                ?>
                                <div data-entity="sku-block">
                                    <div data-entity="sku-line-block">
                                        <ul class="catalog-card-sku">
                                            <?
                                            foreach ($skuProperty['VALUES'] as $value) {
                                                if (!isset($item['SKU_TREE_VALUES'][$propertyId][$value['ID']]))
                                                    continue;

                                                $value['NAME'] = htmlspecialcharsbx($value['NAME']);

                                                ?>
                                                <li class="catalog-card-sku-item"
                                                    title="<?= $value['NAME'] ?>"
                                                    data-treevalue="<?= $propertyId ?>_<?= $value['ID'] ?>"
                                                    data-onevalue="<?= $value['ID'] ?>">
                                                    <span class="catalog-card-sku-item__value"><?= $value['NAME'] ?></span>
                                                    <? if ($value['note']) : ?>
                                                        <span class="catalog-card-sku-item__note"><?= $value['note'] ?></span>
                                                    <? endif; ?>
                                                </li>
                                                <?
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <?
                            }
                            ?>
                        </div>
                        <?
                        foreach ($arParams['SKU_PROPS'] as $skuProperty) {
                            if (!isset($item['OFFERS_PROP'][$skuProperty['CODE']]))
                                continue;

                            $skuProps[] = array(
                                'ID' => $skuProperty['ID'],
                                'SHOW_MODE' => $skuProperty['SHOW_MODE'],
                                'VALUES' => $skuProperty['VALUES'],
                                'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
                            );
                        }

                        unset($skuProperty, $value);

                        if ($item['OFFERS_PROPS_DISPLAY']) {
                            foreach ($item['JS_OFFERS'] as $keyOffer => $jsOffer) {
                                $strProps = '';

                                if (!empty($jsOffer['DISPLAY_PROPERTIES'])) {
                                    foreach ($jsOffer['DISPLAY_PROPERTIES'] as $displayProperty) {
                                        $strProps .= '<dt>' . $displayProperty['NAME'] . '</dt><dd>'
                                            . (is_array($displayProperty['VALUE'])
                                                ? implode(' / ', $displayProperty['VALUE'])
                                                : $displayProperty['VALUE'])
                                            . '</dd>';
                                    }
                                }

                                $item['JS_OFFERS'][$keyOffer]['DISPLAY_PROPERTIES'] = $strProps;
                            }
                            unset($jsOffer, $strProps);
                        }
                    }

                    break;
            }
        }
    }
    ?>
</div>
<a class="link-as-card" href="<?= $item['DETAIL_PAGE_URL'] ?>"></a>
