<?php

namespace App\Controller;

use App\Repository\BookRepository;

class BookController extends Controller
{
    public function route(): void 
    {
        try{
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'show':
                        //appeler la méthode show
                        $this->show();
                        break;
                    case 'list':
                        //appeler la méthode list
                        $this->list();
                        break;
                    case 'add':
                        //appeler la méthode add
                        $this->add();
                        break;
                    case 'delete':
                        //appeler la méthode delete
                        $this->delete();
                        break;
                    case 'update';
                        //appeler la méthode update
                        $this->update();
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

    protected function show()
    {
        try{
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $bookRepository = new BookRepository();
                $book = $bookRepository->finfOneById($id);
                //appeler la page show
                $this->render('book/show', ['book' => $book]);
            } else {
                throw new \Exception('Il n\'y a pas d\'id en paramètre.');
            }
        }
        catch(\Exception $e){
            $this->render('errors/default', ['error' => $e->getMessage()]);
        }
    }

    protected function list()
    {
        // ici on pourrait récupérer les données en faisant appel au modèle
        $this->render('page/home');
    }

    protected function add()
    {
        // ici on pourrait récupérer les données en faisant appel au modèle
        $this->render('page/home');
    }

    protected function delete()
    {
        // ici on pourrait récupérer les données en faisant appel au modèle
        $this->render('page/home');
    }

    protected function update()
    {
        // ici on pourrait récupérer les données en faisant appel au modèle
        $this->render('page/home');
    }
}