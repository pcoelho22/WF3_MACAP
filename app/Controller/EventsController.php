<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\EventsManager;



class EventsController extends Controller {

    /**
     * Page events
     */
    public function liste() {
    	$eventsListeManager = new EventsManager();
        $eventsListe = $eventsListeManager->contenuEvent();
        //debug($galerieListe);

		$this->show('events/liste',
			['eventsListe' => $eventsListe]);
    }
}
