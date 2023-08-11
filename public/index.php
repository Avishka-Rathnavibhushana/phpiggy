<?php
// Remove this line in production
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//

include __DIR__ . "/../src/App/functions.php";

$app = include __DIR__ . '/../src/App/bootstrap.php';

$app->run();
