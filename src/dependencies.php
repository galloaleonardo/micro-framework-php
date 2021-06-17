<?php

declare(strict_types=1);

use Auryn\Injector;
use Twig\Loader\FilesystemLoader;

$injector = new Injector();

$injector->share('\Symfony\Component\HttpFoundation\Request');

$injector->define('\Symfony\Component\HttpFoundation\Request', [
    ':query' => $_GET,
    ':request' => $_POST,
    ':attributes' => [],
    ':cookies' => $_COOKIE,
    ':files' => $_FILES,
    ':server' => $_SERVER
]);

$injector->share('\Symfony\Component\HttpFoundation\Response');

$injector->define('Twig\Environment', [
    ':loader' => new FilesystemLoader(__DIR__ . '/Template/views')
]);

$injector->alias('\MiniFramework\Template\Renderer', '\MiniFramework\Template\TwigRenderer');

return $injector;
