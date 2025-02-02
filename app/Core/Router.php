<?php
// File: app/Router.php
namespace App\Core;

class Router
{
    // Array associativo per memorizzare le rotte: 'uri' => callback
    protected $routes = [];

    /**
     * Aggiunge una nuova rotta.
     *
     * @param string   $route    La rotta (ad es. '/contatti')
     * @param callable $callback La funzione da eseguire quando viene chiamata la rotta
     */
    public function add(string $route, callable $callback)
    {
        // Normalizziamo la rotta: rimuoviamo eventuali slash finali
        $route = rtrim($route, '/');
        if ($route === '') {
            $route = '/';
        }
        $this->routes[$route] = $callback;
    }

    /**
     * Esegue la rotta in base all'URI.
     *
     * @param string $uri L'URI della richiesta (ad es. '/contatti')
     */
    public function dispatch(string $uri)
    {
        // Normalizziamo l'URI in modo analogo alla rotta registrata
        $uri = rtrim($uri, '/');
        if ($uri === '') {
            $uri = '/';
        }

        if (array_key_exists($uri, $this->routes)) {
            // Se la rotta esiste, chiama la funzione associata
            call_user_func($this->routes[$uri]);
        } else {
            // Altrimenti, gestisci l'errore 404
            header("HTTP/1.0 404 Not Found");
            echo "404 - Pagina non trovata";
        }
    }
}
