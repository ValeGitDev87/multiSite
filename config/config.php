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
    ],

    // Altre configurazioni...
];
