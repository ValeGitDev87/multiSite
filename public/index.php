<?php
// Avvia l'autoloading (Composer caricherà tutte le classi automaticamente)
require_once __DIR__ . '/../vendor/autoload.php';

// Puoi inizializzare eventuali configurazioni o sessioni qui
session_start();

// Includi la logica di routing o istanzia il router
// Ad esempio, in futuro potresti avere una classe Router in App\Controllers o simile
echo "Front Controller: Benvenuto nel tuo Framework!";

// Per ora, solo per testare
