<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */

?>

<? if (!empty($arResult)) : ?>
    <div class="header-menu">
        <? foreach ($arResult as $arItem): ?>
            <div class="header-menu-item<?= $arItem['SELECTED'] ? ' header-menu-item_active' : '' ?>">
                <a href="<?= $arItem['LINK'] ?>" class="header-menu-item__link"><?= $arItem['TEXT'] ?></a>
            </div>
        <? endforeach; ?>
    </div>
<? endif;