<?php
// File: public/index.php

// Avvia l'autoloading tramite Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Avvia la sessione (se necessaria)
session_start();

use App\Core\Router;
use App\Core\Config;

// Carica la configurazione
Config::load(__DIR__ . '/../config/config.php');

// Ottieni il base URL dalla configurazione
$baseUrl = Config::get('app.base_url');

// Istanzia il Router
$router = new Router();

// Registra le rotte
$router->add('/', function() {
    echo "<h1>Homepage</h1><p>Benvenuto nella Homepage del tuo Framework!</p>";
});
$router->add('/contatti', function() {
    echo "<h1>Contatti</h1><p>Qui puoi trovare le nostre informazioni di contatto.</p>";
});
$router->add('/chi-siamo', function() {
    echo "<h1>Chi Siamo</h1><p>Informazioni sull'azienda o sul sito.</p>";
});

// Recupera l'URI della richiesta corrente
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Rimuovi il base path (se presente)
if (strpos($uri, $baseUrl) === 0) {
    $uri = substr($uri, strlen($baseUrl));
}

// Se, dopo la rimozione, l'URI è vuoto, impostalo a '/'
if ($uri === '' || $uri === false) {
    $uri = '/';
}

// Per debug, puoi stampare l'URI ottenuto
// echo "URI richiesto: " . $uri;

// Esegui il dispatch in base all'URI normalizzato
$router->dispatch($uri);
