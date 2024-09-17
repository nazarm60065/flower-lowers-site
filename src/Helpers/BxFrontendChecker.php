<?php

namespace Prymery\Helpers;

use CUser;
use Bitrix\Main\Application;

class BxFrontendChecker
{
    const NEED_BX_DIRECTORIES = ['/basket/', '/order/', '/personal/'];
    const GROUPS = [5];

    protected Application $bxApp;
    protected CUser $user;

    public function __construct(Application $bxApp = null, CUser $user = null)
    {
        global $APPLICATION;
        global $USER;

        $this->bxApp = $bxApp ?? $APPLICATION;
        $this->user = $user ?? $USER;
    }

    public function needAddFrontend()
    {
        $checkSection = false;

        foreach (static::NEED_BX_DIRECTORIES as $section) {
            if (strpos($this->bxApp->GetCurDir(), $section) === 0) {
                $checkSection = true;
                break;
            }
        }

        return $this->user->IsAdmin()
            || in_array($this->bxApp->GetCurDir(), static::NEED_BX_DIRECTORIES)
            || $checkSection
            || $this->checkUserGroups();
    }

    protected function checkUserGroups()
    {
        $userGroups = explode(',', $this->user->GetGroups());
        foreach ($userGroups as $userGroup) {
            if (in_array($userGroup, static::GROUPS)) {
                return true;
            }
        }

        return false;
    }
}