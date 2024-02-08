<?php

// utilisation des namespace
namespace App\Controller;

class Controller
{
    public function route(): void 
    {
        try {
            if (isset($_GET['controller'])) {
                switch ($_GET['controller']) {
                    case 'book':
                        //charge le bookcontroller
                        $bookController = new BookController();
                        $bookController->route();
                        break;
                    case 'page';
                        // charger le pagecontroller page
                        $pageController = new PageController();
                        $pageController->route();
                        break;
                    default:
                        // erreur
                        throw new \Exception('Le controller ' . $_GET['controller'] . ' n\'existe pas');
                        break;
                }
            }  else {
                // charger la page d'accueil
                $pageController = new PageController();
                $pageController->home();
            }
        } catch (\Exception $e) {
            $this->render('errors/default', ['error' => $e->getMessage()]);
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
            $this->render('errors/default', ['error' => $e->getMessage()]);
        }
    }
}