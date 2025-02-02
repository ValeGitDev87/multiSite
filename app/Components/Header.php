<?php
// File: app/Components/Header.php
namespace App\Components;

use App\Core\Config;

class Header
{
    protected $config;

    public function __construct()
    {
        // Recupera le impostazioni globali
        $this->config = Config::get('app');
    }

    /**
     * Renderizza l'header HTML.
     *
     * @return string
     */
    public function render(): string
    {
        // Recupera i dati dal config
        $siteName = $this->config['site_name'] ?? 'Il Sito';
        $favicon  = $this->config['favicon'] ?? '';
        
        // Recupera i CSS dal file di configurazione (assets.css)
        $cssLinks = '';
        $cssArray = Config::get('assets.css', []);
        foreach ($cssArray as $css) {
            $cssLinks .= '<link rel="stylesheet" href="' . htmlspecialchars($css) . '">' . PHP_EOL;
        }
        
        // Componi l'HTML dell'header
        // Nota: questo include l'apertura del tag <head> e <title>
        $html = '<head>' . PHP_EOL;
        $html .= '    <meta charset="UTF-8">' . PHP_EOL;
        $html .= '    <meta name="viewport" content="width=device-width, initial-scale=1.0">' . PHP_EOL;
        $html .= '    <title>' . htmlspecialchars($siteName) . '</title>' . PHP_EOL;
        
        if (!empty($favicon)) {
            $html .= '    <link rel="icon" type="image/x-icon" href="' . htmlspecialchars($favicon) . '">' . PHP_EOL;
        }
        
        $html .= $cssLinks;
        $html .= '</head>' . PHP_EOL;
        
        return $html;
    }
}
