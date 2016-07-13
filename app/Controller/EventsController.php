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
        $eventsListe = $eventsListeManager->findAll();
        //debug($galerieListe);

		$this->show('events/liste',
			['eventsListe' => $eventsListe]);
    }
    /**
     * Page de photos de chaque galerie
     */
    public function photos($id) {
    	//echo $id;
		
		$photosID = new GalerieHasPhotoManager();
		$photosGalerieId = $photosID->findPhotoId($id);
        //debug($photosGalerieId);

        $this->show('galerie/photos',['photosGalerie' => $photosGalerieId]);
    }
}
