<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use Framework\App;

use App\Controllers\{HomeController, AboutController};

$app = new App();

$app->get('/', [HomeController::class, 'home']);
$app->get('/about', [AboutController::class, 'about']);

// HomeController::class is the same as 'App\Controllers\HomeController'
// In php  we can call classes and methods as strings

return $app;
