<?php
 
namespace App\Controller;

use Yoop\AbstractController;


class AuthController extends AbstractController
{
   
    public function auth() 
    {
        // si authentifié on ne peut plus venir ici
        if($this->isAuthenticated()) return $this->redirectToRoute("/"); 
        return $this->render('auth');
    }

    public function authProcess() 
    {
        // si authentifié on ne peut plus venir ici
        if($this->isAuthenticated()) return $this->redirectToRoute("/"); 

        if(sizeof($_POST)) {
            if(!empty($_POST['email']) && is_string($_POST['email']) &&
                !empty($_POST['password']) && is_string($_POST['password'])
            ) {
                $user = $this->getRepository('User')->findOneBy(['email' => $_POST['email']]);
                if($user) {
                    if(SHA1($_POST['password'])===$user->getPassword()) {
                        $this->flash()->set('Vous êtes maintenant connecté.', 'success');
                        $this->connectUser($user);
                        return $this->redirectToRoute("/"); 
                    }
                }
            }
            $this->flash()->set("Erreur d'identification", 'error');
        }
        return $this->render('auth', ["error" => "Echec d'authentification."]);        
    }

    public function disconnect() 
    {   
        $this->flash()->set('Vous êtes maintenant déconnecté.', 'success');
        unset($_SESSION['user']);
        return $this->redirectToRoute("/"); 
    }
}