<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\AuthorizationManager;

class DefaultController extends Controller {

    /**
     * Page d'accueil par défaut
     */
    public function home() {
        $this->show('default/home');
    }
    
    public function contact() {
        $this->show('default/contact');
    }

    public function allowTo($roles){
        if (!is_array($roles)){
            $roles = [$roles];
        }
        $authorizationManager = new AuthorizationManager();
        foreach($roles as $role){
            if ($authorizationManager->isGranted($role, $_SESSION['user']['id'])){
                return true;
            }
        }

        $this->showForbidden();
    }
}
