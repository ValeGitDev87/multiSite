<?php
// File: public/index.php

require_once __DIR__ . '/../vendor/autoload.php';
session_start();

use App\Core\Config;
use App\Components\Header;
use App\Core\Router;

// Carica la configurazione
Config::load(__DIR__ . '/../config/config.php');

// Istanzia l'header
$header = new Header();

// Stampa l'header HTML
echo $header->render();

// Ora, se desideri, puoi continuare a stampare il corpo della pagina
echo '<body>' . PHP_EOL;
echo '<div class="container">';
echo '<h1>Benvenuto nel tuo Framework</h1>';
echo '<p>Questo è il contenuto della pagina.</p>';
echo '</div>';


// Esempio di utilizzo del router per il routing (già implementato in precedenza)
$router = new Router();

$router->add('/', function() {
    echo '<div class="container"><h2>Homepage</h2><p>Contenuto della homepage.</p></div>';
});
$router->add('/contatti', function() {
    echo '<div class="container"><h2>Contatti</h2><p>Informazioni di contatto.</p></div>';
});
$router->add('/chi-siamo', function() {
    echo '<div class="container"><h2>Chi Siamo</h2><p>Informazioni sull\'azienda.</p></div>';
});

echo '</body>';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$baseUrl = Config::get('app.base_url');
if (strpos($uri, $baseUrl) === 0) {
    $uri = substr($uri, strlen($baseUrl));
}
if ($uri === '' || $uri === false) {
    $uri = '/';
}
$router->dispatch($uri);
