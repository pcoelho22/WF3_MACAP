<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\GalerieManager;
use \Manager\GalerieHasPhotoManager;
use \Manager\ContenuHasGaleriesManager;

class GalerieController extends Controller {

    /**
     * Page avec galerie de photos
     */
    public function liste() {
    	$galerieListeManager = new GalerieManager();
        $galerieListe = $galerieListeManager->findAll();
        //debug($galerieListe);

		$this->show('galerie/liste',
			['galerieListe' => $galerieListe]);
    }
    /**
     * Page de photos de chaque galerie
     */
    public function photos($id) {
    	//echo $id;
        		
		$galerieHasPhotoManager = new GalerieHasPhotoManager();
		$photosGalerieId = $galerieHasPhotoManager->findPhotoId($id);
        //debug($photosGalerieId);
        $contenuHasGaleriesManager = new ContenuHasGaleriesManager();
        $eventsIdGaleires = $contenuHasGaleriesManager->findGaleriesId($id);
        //debug($eventsIdGaleires);

        $this->show('galerie/photos',['photosGalerie' => $photosGalerieId, 'eventsIdGaleires'=> $eventsIdGaleires]);
    }
}
