<?php

namespace Prymery\BxMustache\Traits;

use Prymery\Components\Helpers\Hermitage;

trait HermitageTrait
{
    protected ?Hermitage $hermitage;

    protected function setHermitage(?Hermitage $hermitage): void
    {
        $this->hermitage = $hermitage;
    }

    protected function getHermitage(): string
    {
        if (isset($this->hermitage) && $this->hermitage) {
            $this->hermitage->addActions($this->arItem);

            return $this->hermitage->getEditAreaId($this->arItem['ID']);
        }

        return '';
    }
}