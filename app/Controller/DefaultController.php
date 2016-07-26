<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\AuthorizationManager;
use \Manager\PhotoManager;

class DefaultController extends Controller {

    /**
     * Page d'accueil par défaut
     */
    public function home() {
        $photoManager=new PhotoManager();
        $imageSlider=$photoManager->getPhotoSlider();
        $this->show('default/home',['imageSlider'=>$imageSlider]);

    }
    
    public function contact() {
        $this->show('default/contact');
    }


    public function confirmation(){
    	$this->show ('default_confirmation');
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

    public function charite(){
        $this->show('default/charite');
    }

    public function aboutUS(){
        $this->show('default/aboutUs');
    }

    public function mapSite(){
        $this->show('default/siteMap');
    }

    public function termsAndConditions(){
        $this->show('default/termsAndConditions');
    }

    public function shop(){
        $this->show('default/shop');
    }
}
