<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\MagazineManager;

class MagazineController extends Controller {

    /**

     */
    public function liste() {
    	$magazineListeManager = new MagazineManager();
        $magazineListe = $magazineListeManager->findAll();
        //debug($galerieListe);

		$this->show('magazine/liste',
			['magazineListe' => $magazineListe]);
    }
}
