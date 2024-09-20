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

if ($arResult['context'] && $arResult['context']['items']) :?>
    <section class="homepage-faq">
        <div class="container homepage-faq-container">
            <? if ($arParams['TITLE']): ?>
                <div class="homepage__title homepage-faq__title"><?= $arParams['TITLE'] ?></div>
            <? endif; ?>
            <div class="homepage-faq-list">
                <? foreach ($arResult['context']['items'] as $item) : ?>
                    <div class="homepage-faq-item"<?= $item['strMainId'] ? (' id="' . $item['strMainId'] . '"') : ''; ?>>
                        <div class="homepage-faq-item-top">
                            <div class="homepage-faq-item-top__title"><?= $item['title'] ?>
                            </div>
                            <div class="homepage-faq-item-top__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="9" fill="none"
                                     viewBox="0 0 17 9">
                                    <path stroke="#242424" stroke-linecap="round" stroke-miterlimit="10"
                                          stroke-width=".5"
                                          d="m1.06 1.01 7.2 7.2c.15.15.39.15.54 0l7.2-7.2"/>
                                </svg>
                            </div>
                        </div>
                        <div class="homepage-faq-item-hidden">
                            <div class="homepage-faq-item__text">
                                <?= $item['text'] ?>
                            </div>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </section>
<? endif; ?>
