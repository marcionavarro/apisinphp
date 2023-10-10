<?php

use Dotenv\Dotenv;

require dirname(__DIR__) . "/vendor/autoload.php";

set_error_handler("ErrorHandle::handleError");
set_exception_handler("ErrorHandle::handleException");

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

header("Content-type: application/json; charset=UTF-8");