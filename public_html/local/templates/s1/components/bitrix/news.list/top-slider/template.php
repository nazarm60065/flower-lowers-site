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
    <section class="homepage-top">
        <div class="swiper homepage-top-slider">
            <button class="homepage-top-slider__arrow homepage-top-slider__arrow_prev slider__arrow slider__arrow_prev"
                    type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 32 32">
                    <path stroke="#FFFAED" stroke-linecap="round" stroke-miterlimit="10"
                          d="M23.073 15.94H9.154M16.47 8.55l-7.225 7.2a.38.38 0 0 0 0 .54l7.225 7.2"/>
                </svg>
            </button>
            <div class="swiper-wrapper">
                <? foreach ($arResult['context']['items'] as $item) : ?>
                    <div class="swiper-slide homepage-top-slide"<?= $item['strMainId'] ? (' id="' . $item['strMainId'] . '"') : ''; ?>>
                        <? if ($item['image']) : ?>
                            <picture class="homepage-top-slide__picture">
                                <? if ($item['image']['mobileSrc']) : ?>
                                    <source srcset="<?= $item['image']['mobileSrc'] ?>"
                                            media="(max-width: 767px)">
                                <? endif; ?>
                                <? if ($item['image']['tabletSrc']) : ?>
                                    <source srcset="<?= $item['image']['tabletSrc'] ?>"
                                            media="(max-width: 1279px)">
                                <? endif; ?>
                                <img src="<?= $item['image']['src'] ?>"
                                     alt="<?= $item['image']['alt'] ?>"
                                     class="homepage-top-slide__img" loading="lazy">
                            </picture>
                        <? endif; ?>
                    </div>
                <? endforeach; ?>
            </div>
            <button class="homepage-top-slider__arrow homepage-top-slider__arrow_next slider__arrow slider__arrow_next"
                    type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 32 32">
                    <path stroke="#FFFAED" stroke-linecap="round" stroke-miterlimit="10"
                          d="M8.928 16.06h13.918M15.53 23.45l7.225-7.2a.38.38 0 0 0 0-.54l-7.225-7.2"/>
                </svg>
            </button>
        </div>
        <div class="homepage-top-cards-wrapper">
            <div class="container homepage-top-cards-container">
                <div class="swiper homepage-top-cards">
                    <button class="homepage-top-cards__arrow homepage-top-cards__arrow_prev slider__arrow slider__arrow_prev"
                            type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 32 32">
                            <path stroke="#D2B9AE" stroke-linecap="round" stroke-miterlimit="10"
                                  d="M23.073 15.94H9.154M16.47 8.55l-7.225 7.2a.38.38 0 0 0 0 .54l7.225 7.2"/>
                        </svg>
                    </button>
                    <div class="swiper-wrapper">
                        <? foreach ($arResult['context']['items'] as $item) : ?>
                            <div class="swiper-slide homepage-top-card">
                                <div class="homepage-top-card-container">
                                    <? if ($item['suptitle']) : ?>
                                        <div class="homepage-top-card__suptitle"><?= $item['suptitle'] ?></div>
                                    <? endif; ?>
                                    <? if ($item['title']) : ?>
                                        <div class="homepage-top-card__title"><?= $item['title'] ?></div>
                                    <? endif; ?>
                                    <? if ($item['link']) : ?>
                                        <div class="homepage-top-card-link-container">
                                            <a href="<?= $item['link']['href'] ?>"
                                               class="homepage-top-card__link"><?= $item['link']['text'] ?></a>
                                        </div>
                                    <? endif; ?>
                                </div>
                            </div>
                        <? endforeach; ?>
                    </div>
                    <div class="slider__dots homepage-top-cards-dots"></div>
                    <button class="homepage-top-cards__arrow homepage-top-cards__arrow_next slider__arrow slider__arrow_next"
                            type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 32 32">
                            <path stroke="#D2B9AE" stroke-linecap="round" stroke-miterlimit="10"
                                  d="M8.928 16.06h13.918M15.53 23.45l7.225-7.2a.38.38 0 0 0 0-.54l-7.225-7.2"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
<?endif;
