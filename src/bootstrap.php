<?php

declare(strict_types=1);

namespace PWF;

use Dotenv\Dotenv;
use Whoops\Run;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use Whoops\Handler\PrettyPageHandler;
use function FastRoute\simpleDispatcher;

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

$env = 'development';

$whoopsErrorHandler = new Run();

if ($env === 'development') {
    $whoopsErrorHandler->pushHandler(new PrettyPageHandler());
} else {
    $whoopsErrorHandler->pushHandler(function ($e) {
        echo 'Todo: Friendly error page and send and email to developer.';
    });
}

$whoopsErrorHandler->register();

$dotenv = Dotenv::createUnsafeImmutable(dirname(__DIR__));
$dotenv->load();

$injector = include 'dependencies.php';

$request = $injector->make('\Symfony\Component\HttpFoundation\Request');
$response = $injector->make('\Symfony\Component\HttpFoundation\Response');

$routeCallback = function (RouteCollector $r) {
    $routes = include 'routes.php';

    foreach ($routes as $route) {
        $r->addRoute($route[0], $route[1], $route[2]);
    }
};

$dispatcher = simpleDispatcher($routeCallback);

$httpMethod = $request->getMethod();
$uri = $request->getRequestUri();

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        $response->setContent('404 - Page not found.')
            ->setStatusCode(404);

        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $response->setContent('405 - Method not allowed.')
            ->setStatusCode(405);

        break;
    case Dispatcher::FOUND:
        $className = $routeInfo[1][0];
        $method = $routeInfo[1][1];
        $vars = $routeInfo[2];

        $class = $injector->make($className);
        $class->$method($vars);

        break;
}

foreach ($response->headers as $header) {
    $content = is_array($header) ? $header[0] : $header;
    header($content, false);
}

echo $response->getContent();
