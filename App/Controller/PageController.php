<?php

namespace App\Controller;
class PageController extends Controller
{
    public function route(): void 
    {
        try{
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'about':
                        //appeler la méthode about
                        $this->about();
                        break;
                    case 'home';
                        //appeler la méthode home
                        $this->home();
                        break;
                    default:
                        // erreur
                        throw new \Exception('L\'action ' . $_GET['action'] . ' n\'existe pas');
                        break;
                }
            } else {
                throw new \Exception('Il n\'y a pas d\'action');
            }
        }
        catch(\Exception $e){
            $this->render('errors/default', ['error' => $e->getMessage()]);
        }
    }

    protected function about()
    {
        // ici on pourrait récupérer les données en faisant appel au modèle
        $this->render('page/about', ['mickey' => 'mouse', 'dingo' => 'dog', 'donald' => 'duck']);
    }

    protected function home()
    {
        // ici on pourrait récupérer les données en faisant appel au modèle
        $this->render('page/home');
    }
}