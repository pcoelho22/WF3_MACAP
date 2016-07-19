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

    public function eventsDetails($id) {
        //echo $id;
        
        $eventsManager = new EventsManager();
        $eventsId = $eventsManager->find($id);
        //debug($eventsId);

        $contenuHasGaleriesManager = new ContenuHasGaleriesManager();
        $eventsIdGaleires = $contenuHasGaleriesManager->findGaleriesId($id);
        //debug($eventsIdGaleires);
        
        $this->show('events/eventsDetails',['eventsId' => $eventsId, 'eventsIdGaleires' => $eventsIdGaleires]);
   
    }
}
