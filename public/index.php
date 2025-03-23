<?php

session_start();
require __DIR__ . '/../vendor/autoload.php';

define('VIEW_DIR', __DIR__.'/../resources/views');
define('CONFIG_DIR', __DIR__.'/../config');
define('LANG_DIR', __DIR__.'/../lang');
define('MESSAGES', require LANG_DIR.'/fr/validation.php');
define('CODES', require VIEW_DIR.'/./codes/');



require '../core/helpers/functions.php';





$router = new Tecgdcs\Router();
$router-> route();


