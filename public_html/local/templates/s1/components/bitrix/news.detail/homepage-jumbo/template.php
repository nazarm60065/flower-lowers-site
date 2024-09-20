<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

?>

<? if ($arResult['context']) : ?>
    <section class="homepage-jumbo">
        <? if ($arResult['context']['images']) : ?>
            <div class="homepage-jumbo-images">
                <? foreach ($arResult['context']['images'] as $image) : ?>
                    <div class="homepage-jumbo-image">
                        <img src="<?= $image['SRC'] ?>" alt="<?= $image['ALT'] ?>" loading="lazy"
                             class="homepage-jumbo-image__img">
                    </div>
                <? endforeach; ?>
            </div>
        <? elseif ($arResult['context']['video']) : ?>
            <div class="homepage-jumbo-video-container">
                <video src="<?= $arResult['context']['video']['src'] ?>" class="homepage-jumbo__video" autoplay loop
                       muted playsinline
                       poster="<?= $arResult['context']['video']['poster'] ?>"></video>
            </div>
        <? endif; ?>
        <? if ($arResult['context']['link']): ?>
            <div class="homepage-jumbo-button-container">
                <?= $arResult['context']['link']['isExternal'] ? '<!--noindex-->' : '' ?>
                <a href="<?= $arResult['context']['link']['href'] ?>"
                    <?= $arResult['context']['link']['isExternal'] ?> rel="nofollow" target="_blank"
                   class="button button_filled-pink homepage-jumbo__button"><?= $arResult['context']['link']['text'] ?>
                </a>
                <?= $arResult['context']['link']['isExternal'] ? '<!--/noindex-->' : '' ?>
            </div>
        <? endif; ?>
    </section>
<? endif; ?>