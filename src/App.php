<?php

namespace Prymery;

use Bitrix\Main\Application;
use Bitrix\Main\Context;


class App
{
    const INCLUDE_PATH = '/local/include/';
    const ASSETS_PATH = '/local/assets/local/';
    const AJAX_URL_PARAM = 'is_ajax';

    public static $app;
    public static $docRoot;
    public static $cmain;
    public static $context;

    public static function init()
    {
        self::$app = Application::getInstance();
        self::$docRoot = Application::getDocumentRoot();
        self::$cmain =& $GLOBALS['APPLICATION'];
        self::$context = Context::getCurrent();
    }

    /**
     * IncludePath in local/include
     * @param $componentPath
     * @param boolean $absPath
     * @param string $ext
     * @return string
     */
    public static function includePath($componentPath, $absPath = true, $ext = '.php')
    {
        return ($absPath ? self::$docRoot : '') . self::INCLUDE_PATH . $componentPath . $ext;
    }

    public static function CMain()
    {
        return self::$cmain;
    }

    protected static function assetsFullPathCompile(array $paths, string $ext)
    {
        foreach ($paths as $key => $path) {
            if (count(explode('/', $path)) === 1) {
                $paths[$key] = self::ASSETS_PATH . $path . '/' . $path . $ext;
            }
        }

        return $paths;
    }

    public static function inlineJs(array $paths = [])
    {
        self::$cmain->SetPageProperty('inlineJs', \implode(';', $paths));
    }

    public static function asyncJs(array $paths = [])
    {
        self::$cmain->SetPageProperty('asyncJs', \implode(';', $paths));
    }

    public static function deferredJs(array $paths = [])
    {
        self::$cmain->SetPageProperty('deferredJs', \implode(';', $paths));
    }

    public static function deferredCss(array $paths = [])
    {
        self::$cmain->SetPageProperty('deferredCss', \implode(';', $paths));
    }

    public static function inlineCss(array $paths = [])
    {
        self::$cmain->SetPageProperty('inlineCss', \implode(';', $paths));
    }

    /**
     * По умолчанию подключает файл /local/include/ . $path . '.php'
     *
     * @param string $path
     * @param bool $includePath
     * @param array $params
     * @param string $hideIcons
     * @return mixed
     */
    public static function Include(string $path, bool $includePath = true, array $params = [], string $hideIcons = 'Y')
    {
        if ($includePath) {
            $path = self::includePath($path, false);
        }

        $arParams = array_merge(
            array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => $path,
                "AREA_FILE_RECURSIVE" => "N",
                "AREA_FILE_SUFFIX" => "",
                "EDIT_TEMPLATE" => "",
                "SITE_LANG" => self::$context->getLanguage()
            ),
            $params
        );

        return self::$cmain->IncludeComponent(
            "bitrix:main.include",
            "",
            $arParams,
            false,
            [
                "HIDE_ICONS" => $hideIcons
            ]
        );
    }

    /**
     * Установка свойств страницы [Ключ - Значение]
     *
     * @param array $props
     * @return void
     */
    public static function setPageProperties(array $props): void
    {
        foreach ($props as $key => $value) {
            self::$cmain->SetPageProperty($key, $value);
        }
    }

    public static function restartBufferIsAjax(): void
    {
        if (static::isAjax()) $GLOBALS['APPLICATION']->RestartBuffer();
    }

    public static function isAjax(): bool
    {
        $request = Context::getCurrent()->getRequest();

        return !empty($request->get(static::AJAX_URL_PARAM)) && $request->get(static::AJAX_URL_PARAM) == 'y';
    }
}