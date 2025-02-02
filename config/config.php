<?php
/**
 * Configurazione dell'applicazione
 */

return [
    // Impostazioni per il database
    'db' => [
        'host'     => 'localhost',
        'dbname'   => 'nome_database',
        'user'     => 'nome_utente',
        'password' => 'password_database',
        'charset'  => 'utf8'
    ],

    // Impostazioni dell'applicazione
    'app' => [
        // Se il progetto è in una sottocartella, imposta qui il base URL (ad esempio: '/multisite/public')
        'base_url' => '/multisite/public',
        'debug'    => true,
        'timezone' => 'Europe/Rome',
        'locale'   => 'it_IT',
        'charset'  => 'utf-8',
        'site_name' => 'MultiSite',
        'favicon' => 'favicon.ico',

    ],
  

    'assets' => [
        'css' => [
            '/assets/css/style.css',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
        
        ],
        'js'=>[
            '/assets/js/script.js',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'
        ]
    ]
];