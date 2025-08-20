<?php
 
namespace App\Controller;

use Yoop\AbstractController;


class HomeController extends AbstractController
{
    public function print() 
    {  
        $user = $this->getUser();
        if($user) {
            if($user->getEmail() == 'admin@boutik.com') {
                $flag = $this->getFlag();
            }
        }
        $pdo = $this->getRepository('Product');
        if(!empty($_GET['q']) && is_string($_GET['q'])) {
            $keyword = $_GET['q'];
            try {
                $products = $pdo->query("SELECT * FROM product WHERE title LIKE '%$keyword%' OR description LIKE '%$keyword%' LIMIT 12", true);
            } catch(\PDOException $e) {
                $this->flash()->set('Une erreur est survenue lors de l’exécution de la requête... '.$e->getMessage(),'error');
            }
        } else {
            $products = $pdo->query("SELECT * FROM product LIMIT 12", true);
        }

        return $this->render('home', [
            'keyword'   => $_GET['q']??"", 
            'products'  => $products??[], 
            'flag'      => $flag??null
        ]);
    }

}