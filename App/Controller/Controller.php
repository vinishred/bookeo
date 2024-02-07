<?php

// utilisation des namespace
namespace App\Controller;

class Controller
{
    public function route(): void 
    {
        if (isset($_GET['controller'])) {
            switch ($_GET['controller']) {
                case 'book':
                    //charge le bookcontroller
                    var_dump('vous etes sur la page book');
                    $pageController = new PageController();
                    $pageController->route();
                    break;
                case 'page';
                    // charger le pagecontroller page
                    var_dump('vous etes sur la page page');
                    $pageController = new PageController();
                    $pageController->route();
                    break;
                default:
                    // erreur
                    var_dump('vous etes sur la page 404');
                    $pageController = new PageController();
                    $pageController->route();
                    break;
            }
        } else {
            // charger la page d'accueil
            var_dump('accueil');
        }
    } 
    // on crée une fonction qui va gérer le rendu de la page d'ou le nom
    protected function render(string $path, array $params = []): void
    {
        $filePath = _ROOTPATH_ . '/templates/' . $path . '.php';
        try {
            if (!file_exists($filePath)) {
                // Générer une erreur
                throw new \Exception('Le fichier ' . $filePath . ' n\'existe pas');
            } else {
                extract($params);
                require_once $filePath;
            }
        } catch (\Exception $e) {
            // Générer une erreur
            echo $e->getMessage();
        }
    }
}