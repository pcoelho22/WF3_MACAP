<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\GalerieManager;
use \Manager\GalerieHasPhotoManager;


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
		
		$photosID = new GalerieHasPhotoManager();
		$photosGalerieId = $photosID->findPhotoId($id);
        //debug($photosGalerieId);

        $this->show('galerie/photos',['photosGalerie' => $photosGalerieId]);
    }
}
