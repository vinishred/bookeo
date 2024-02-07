<?php

namespace App\Controller;
class PageController extends Controller
{
    public function route(): void 
    {
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'about':
                    //appeler la méthode about
                    $this->about();
                    break;
                case 'home';
                    //appeler la méthode home
                    var_dump('vous voici dans la section  home');
                    break;
                default:
                    // erreur
                    var_dump('vous voici dans la section  404');
                    break;
            }
        } else {
            // charger la page d'accueil
            var_dump('accueil');
        }
    }

    protected function about()
    {
        // ici on pourrait récupérer les données en faisant appel au modèle
        $this->render('page/about', ['mickey' => 'mouse', 'dingo' => 'dog', 'donald' => 'duck']);

    }
}