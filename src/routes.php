<?php

declare(strict_types=1);


return [
    ['GET', '/', [MiniFramework\Controllers\WelcomeController::class, 'index']],
    
    // Example routes.
    ['GET', '/example', [MiniFramework\Controllers\ExampleController::class, 'index']],
    ['GET', '/example/{example}', [MiniFramework\Controllers\ExampleController::class, 'get']],
    ['POST', '/example', [MiniFramework\Controllers\ExampleController::class, 'store']],
    ['PUT', '/example/{example}', [MiniFramework\Controllers\ExampleController::class, 'update']],
    ['DELETE', '/example/{example}', [MiniFramework\Controllers\ExampleController::class, 'destroy']],
];
