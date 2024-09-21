<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */

?>

<? if (!empty($arResult)) : ?>
    <div class="catalog-sections-wrapper">
        <div class="container catalog-container">
            <div class="swiper catalog-sections">
                <div class="swiper-wrapper">
                    <? foreach ($arResult as $arItem): ?>
                        <div class="swiper-slide catalog-sections-slide<?= $arItem['SELECTED'] ? ' catalog-sections-slide_active' : '' ?>">
                            <a href="<?= $arItem['LINK'] ?>"
                               class="catalog-sections-slide__link"><?= $arItem['TEXT'] ?></a>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<? endif;