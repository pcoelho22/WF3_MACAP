<?php

namespace Controller;

use \W\Controller\Controller;
require ('../vendor/phpmailer/phpmailer/PHPMailerAutoload.php');

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

    public function confirmation(){
    	$this show ('default_confirmation');
    }


}
