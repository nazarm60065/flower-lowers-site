<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

if ($arResult['context'] && $arResult['context']['cols']) :?>
    <div class="header-modal-menu-wrapper">
        <div class="header-modal-menu">
            <? foreach ($arResult['context']['cols'] as $col) : ?>
                <div class="header-modal-menu-col">
                    <? foreach ($col as $item) : ?>
                        <div class="header-modal-menu-section"<?= $item['strMainId'] ? (' id="' . $item['strMainId'] . '"') : ''; ?>>
                            <div class="header-modal-menu-section-top">
                                <div class="header-modal-menu-section-top__title"><?= $item['text'] ?></div>
                                <div class="header-modal-menu-section-top__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="9" fill="none"
                                         viewBox="0 0 17 9">
                                        <path stroke="#242424" stroke-linecap="round" stroke-miterlimit="10"
                                              stroke-width=".6"
                                              d="m1 .829 7.229 7.229c.15.15.391.15.542 0L16 .829"/>
                                    </svg>
                                </div>
                                <? if ($item['href']): ?>
                                    <a href="<?= $item['href'] ?>"
                                       class="link-as-card header-modal-menu-section-top__link"></a>
                                <? endif; ?>
                            </div>
                            <? if ($item['sublinks']): ?>
                                <div class="header-modal-menu-section-hidden">
                                    <div class="header-modal-menu-list">
                                        <? foreach ($item['sublinks'] as $sublink) : ?>
                                            <div class="header-modal-menu-item">
                                                <? if ($item['isExternal']): ?> <!--noindex--><? endif; ?>
                                                <a href="<?= $sublink['href'] ?>"
                                                   class="header-modal-menu-item__link"<?= $item['isExternal'] ? (' rel="nofollow" target="_blank"') : ''; ?>><?= $sublink['text'] ?></a>
                                                <? if ($item['isExternal']): ?> <!--noindex--><!--/noindex--> <? endif; ?>
                                            </div>
                                        <? endforeach; ?>
                                    </div>
                                </div>
                            <? endif; ?>
                        </div>
                    <? endforeach; ?>
                </div>
            <? endforeach; ?>
        </div>
        <? if ($arResult['context']['allLink']): ?>
            <div class="header-modal-menu-link-container">
                <a href="<?= $arResult['context']['allLink']['href'] ?>"
                   class="header-modal-menu__link"><?= $arResult['context']['allLink']['text'] ?></a>
            </div>
        <? endif; ?>
    </div>
<?endif;
