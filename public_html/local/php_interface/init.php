<?php

use Prymery\App;

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php')) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php');

    App::init();
}

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/config/events.php')) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/config/events.php');
}


if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/config/const.php')) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/config/const.php');
}
