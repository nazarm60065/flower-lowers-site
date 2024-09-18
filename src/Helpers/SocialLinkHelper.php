<?php

namespace Prymery\Helpers;

class SocialLinkHelper
{
    static public function checkHrefIsExternal($href)
    {
        return str_starts_with($href, 'http');
    }
}