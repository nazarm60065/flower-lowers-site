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
    <section class="homepage-about">
        <? if ($arResult['context']['image']) : ?>
            <div class="homepage-about-image-wrapper">
                <img src="<?= $arResult['context']['image']['SRC'] ?>" alt="<?= $arResult['context']['image']['ALT'] ?>"
                     class="homepage-about-image__img" loading="lazy">
            </div>
        <? endif; ?>
        <div class="homepage-about-card">
            <div class="container homepage-about-container">
                <? if ($arResult['context']['suptitle']) : ?>
                    <div class="homepage-about-card__suptitle"><?= $arResult['context']['suptitle'] ?></div>
                <? endif; ?>
                <? if ($arResult['context']['title']) : ?>
                    <div class="homepage__title homepage-about-card__title"><?= $arResult['context']['title'] ?></div>
                <? endif; ?>

                <? if ($arResult['context']['text']) : ?>
                    <div class="homepage-about-card__text">
                        <?= $arResult['context']['text'] ?>
                    </div>
                <? endif; ?>
                <? if ($arResult['context']['link']) : ?>
                    <div class="homepage-about-card-button-container">
                        <? if ($arResult['context']['link']['isExternal']) : ?> <!--noindex--><? endif; ?>
                        <a href="<?= $arResult['context']['link']['href'] ?>"
                            <? if ($arResult['context']['link']['isExternal']) : ?> rel="nofollow" target="_blank"<? endif; ?>
                           class="button button_filled-pink homepage-about-card__button"><?= $arResult['context']['link']['text'] ?></a>
                        <? if ($arResult['context']['link']['isExternal']) : ?> <!--/noindex--><? endif; ?>
                    </div>
                <? endif; ?>
            </div>
        </div>
    </section>
<? endif; ?>