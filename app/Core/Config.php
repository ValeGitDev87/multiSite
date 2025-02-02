<?php
namespace App\Core;

class Config
{
    protected static $config;

    /**
     * Carica la configurazione dal file specificato.
     *
     * @param string $file Percorso del file di configurazione
     */
    public static function load(string $file)
    {
        if (file_exists($file)) {
            self::$config = require $file;
        } else {
            throw new \Exception("File di configurazione non trovato: " . $file);
        }
    }

    /**
     * Restituisce una configurazione specifica tramite una chiave a puntini.
     * Ad esempio: Config::get('db.host');
     *
     * @param string $key     La chiave della configurazione
     * @param mixed  $default Valore di default se la chiave non esiste
     * @return mixed
     */
    public static function get(string $key, $default = null)
    {
        $keys = explode('.', $key);
        $value = self::$config;

        foreach ($keys as $k) {
            if (isset($value[$k])) {
                $value = $value[$k];
            } else {
                return $default;
            }
        }
        return $value;
    }
}
