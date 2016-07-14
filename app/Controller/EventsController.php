<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\EventsManager;
use \Manager\ContenuHasGaleriesManager;

class EventsController extends Controller {

    /**
     * Page liste events
     */
    public function liste() {
    	$eventsListeManager = new EventsManager();
        $eventsListe = $eventsListeManager->contenuEvent();
        //debug($galerieListe);

		$this->show('events/liste',
			['eventsListe' => $eventsListe]);
    }
       /**
     * Page de chaque galerie pour events
     */
    public function galerieEvents($id) {
        //echo $id;
        
        $events = new ContenuHasGaleriesManager();
        $eventsGalerieListe = $events->findGaleriesId($id);
        //debug($eventsGalerieListe);

        $this->show('galerie/listeParEvents',['eventsGalerieListe' => $eventsGalerieListe]);
    }
}
