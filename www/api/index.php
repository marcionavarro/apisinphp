<?php
declare(strict_types=1);
//ini_set("display_errors", "On");

use Dotenv\Dotenv;

require dirname(__DIR__) . "/vendor/autoload.php";

set_error_handler("ErrorHandle::handleError");
set_exception_handler("ErrorHandle::handleException");

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$parts = explode("/", $path);
$resource = $parts[3];
$id = $parts[4] ?? null;

if($resource != "tasks"){
//    header("{$_SERVER['SERVER_PROTOCOL']} 404 NOT FOUND");
    http_response_code(404);
    exit;
}

header("Content-type: application/json; charset=UTF-8");

$database = new Database($_ENV["DB_HOST"], $_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASS"]);

$task_gateway = new TaskGateway($database);
$controller = new TaskController($task_gateway);

$controller->processRequest($_SERVER['REQUEST_METHOD'], $id);