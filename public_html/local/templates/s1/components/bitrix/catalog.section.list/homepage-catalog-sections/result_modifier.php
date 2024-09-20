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

use Prymery\Components\Helpers\Hermitage;
use Prymery\Components\Helpers\ImageResizeHelper;

$sections = collect($arResult['SECTIONS']);

if ($sections->isNotEmpty()) {
    $hermitage = new Hermitage($this, $arParams);

    $arResult['context'] = [
        'title' => $arParams['TITLE'],
        'suptitle' => $arParams['SUPTITLE'],
        'items' => $sections->map(function ($arSection) use ($hermitage) {
            $hermitage->addActions($arSection);
            $image = null;
            $isBig = !!$arSection['UF_WIDE'];
            $size = $isBig ? [
                'width' => 1280,
                'height' => 800,
            ] : [
                'width' => 640,
                'height' => 800,
            ];

            if ($arSection['PICTURE']) {
                $image = ImageResizeHelper::resize($arSection['PICTURE'], $size, BX_RESIZE_IMAGE_EXACT, $arSection['NAME']);
            }

            return [
                'strMainId' => $hermitage->getEditAreaId($arSection['ID']),
                'isBig' => $isBig,
                'title' => $arSection['NAME'],
                'text' => $arSection['~DESCRIPTION'],
                'image' => $image,
                'sectionPageUrl' => $arSection['SECTION_PAGE_URL'],
            ];
        }),
    ];
}