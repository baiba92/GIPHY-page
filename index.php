<?php declare(strict_types=1);

require 'vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require 'router.php';

$loader = new FilesystemLoader(__DIR__ . '/app/Views');
$twig = new Environment($loader);

echo $twig->render('view.html.twig', [
    'collection' => $collection,
    'formSubmitted' => $_GET['formSubmitted'],
    'keyWord' => $_GET['keyWord']
]);
