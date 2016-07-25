<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\MagazineManager;

class MagazineController extends Controller {

    /**

     */
    public function liste() {
    	$magazineManager = new MagazineManager();
        $magazineListe = $magazineManager->findAll();
        //debug($galerieListe);

		$this->show('magazine/liste',
			['magazineListe' => $magazineListe]);
    }

    public function add(){
        $this->allowTo('2');

    }

    public function addVal(){
        $this->allowTo('2');
        $magazineManager = new MagazineManager();
    }

    public function edit($id){
        $this->allowTo('2');
        $magazineManager = new MagazineManager();
    }

    public function editVal($id){
        $this->allowTo('2');
        $magazineManager = new MagazineManager();
    }

    public function delete($id){
        $this->allowTo('2');
        $magazineManager = new MagazineManager();

        $magazineManager->delete($id);

        $this->redirectToRoute('magazine_liste');
    }
}
