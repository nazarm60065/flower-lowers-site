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

<? if ($arResult['context'] && $arResult['context']['items']) : ?>
    <section class="homepage-sections">
        <div class="container homepage-sections-container">
            <? if ($arResult['context']['title']) : ?>
                <div class="homepage-sections-top">
                    <? if ($arResult['context']['suptitle']) : ?>
                        <div class="homepage-sections__suptitle"><?= $arResult['context']['suptitle'] ?></div>
                    <? endif; ?>
                    <div class="homepage__title homepage-sections__title"><?= $arResult['context']['title'] ?></div>
                </div>
            <? endif; ?>
        </div>
        <div class="homepage-sections-list">
            <? foreach ($arResult['context']['items'] as $item): ?>
                <div class="homepage-section<?=$item['isBig'] ? ' homepage-section_big' : ''?>"<?= $item['strMainId'] ? (' id="' . $item['strMainId'] . '"') : ''; ?>>
                    <? if ($item['image']) : ?>
                        <div class="homepage-section-image">
                            <picture class="homepage-section-image__picture">
                                <img src="<?= $item['image']['SRC'] ?>"
                                     alt="<?= $item['image']['ALT'] ?>"
                                     class="homepage-section-image__img" loading="lazy">
                            </picture>
                        </div>
                    <? endif; ?>
                    <div class="homepage-section-content">
                        <? if ($item['title']): ?>
                            <div class="homepage-section__title"><?= $item['title'] ?></div>
                        <? endif; ?>
                        <? if ($item['text']): ?>
                            <div class="homepage-section__subtitle"><?= $item['text'] ?></div>
                        <? endif; ?>
                    </div>
                    <a href="<?=$item['sectionPageUrl']?>" class="link-as-card"></a>
                </div>
            <? endforeach; ?>
        </div>
    </section>
<? endif; ?>
