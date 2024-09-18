<?php

namespace Prymery\Components\Helpers;

use CBitrixComponentTemplate;
use CIBlock;
class Hermitage
{
    protected $template;
    protected $strElementEdit;
    protected $strElementDelete;
    protected $arElementDeleteParams;

    public function __construct(
        CBitrixComponentTemplate $template,
        array $arParams
    ) {
        $this->template = $template;
        $this->strElementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
        $this->strElementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
        $this->arElementDeleteParams = [
            'CONFIRM' => 'Будет удалена вся информация, связанная с этой записью. Продолжить?'
        ];
    }

    public function addActions(array $arItem)
    {
        $this->template->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $this->strElementEdit);
        $this->template->AddDeleteAction(
            $arItem['ID'],
            $arItem['DELETE_LINK'],
            $this->strElementDelete,
            $this->arElementDeleteParams
        );
    }

    public function getEditAreaId($id)
    {
        return $this->template->GetEditAreaId($id);
    }
}