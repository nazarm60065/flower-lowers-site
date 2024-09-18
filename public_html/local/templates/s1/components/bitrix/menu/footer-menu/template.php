<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */

?>

<? if (!empty($arResult)) : ?>
    <div class="footer-menu-section">
        <? if ($arParams['TITLE']): ?>
            <div class="footer-menu-section-top">
                <div class="footer-menu-section-top__text"><?= $arParams['TITLE'] ?></div>
                <div class="footer-menu-section-top__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="9" fill="none" viewBox="0 0 17 9">
                        <path stroke="#FFFAED" stroke-linecap="round" stroke-miterlimit="10"
                              d="m1.06.51 7.2 7.2c.15.15.39.15.54 0L16 .51"/>
                    </svg>
                </div>
            </div>
        <? endif; ?>
        <div class="footer-menu-section-hidden">
            <ul class="footer-menu-list">
                <? foreach ($arResult as $arItem): ?>
                    <li class="footer-menu-item<?= $arItem['SELECTED'] ? ' footer-menu-item_active' : '' ?>">
                        <a href="<?= $arItem['LINK'] ?>" class="footer-menu-item__link"><?= $arItem['TEXT'] ?></a>
                    </li>
                <? endforeach; ?>
            </ul>
        </div>
    </div>
<? endif;