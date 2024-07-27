<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../../vendor/autoload.php';

// Instantiate App
$app = AppFactory::create();

// Add error middleware
$app->addErrorMiddleware(true, true, true);

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates/');
$twig = new Twig\Environment($loader, [
    'debug' => true,
    'cache' => false,
]);

$twig->addExtension(new \Twig\Extension\DebugExtension());

//Liste des routes
include_once(__DIR__ . '/../routes/app.php');

$app->run();
