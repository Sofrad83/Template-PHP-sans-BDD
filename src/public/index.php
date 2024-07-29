<?php

use Slim\Factory\AppFactory;
use App\Support\Route;

require __DIR__ . '/../../vendor/autoload.php';

session_start();

if (!isset($_SESSION['initialized'])) {
    // Initialiser les variables globales
    $_SESSION['lang'] = 'fr';
    
    // Indiquer que les variables ont été initialisées
    $_SESSION['initialized'] = true;
}

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

Route::init($app);

//Liste des routes
include_once(__DIR__ . '/../routes/app.php');

$app->run();
