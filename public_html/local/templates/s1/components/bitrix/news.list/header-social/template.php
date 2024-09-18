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
    <div class="socials">
        <? foreach ($arResult['context']['items'] as $item) : ?>
            <div class="socials-item"<?= $item['strMainId'] ? (' id="' . $item['strMainId']. '"') : ''; ?>>
                <!--noindex-->
                <a href="<?= $item['href'] ?>" class="socials-item__link">
                    <? if ($item['icon']) : ?>
                        <span class="socials-item__link-icon"><?= $item['icon'] ?></span>
                    <? endif; ?>
                    <? if ($item['text']) : ?>
                        <span class="socials-item__link-text"><?= $item['text'] ?></span>
                    <? endif; ?>
                </a>
                <!--/noindex-->
            </div>
        <? endforeach; ?>
    </div>
<?endif;
