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
        $firstPhoto = array();
    	$galerieManager = new GalerieManager();
        $galerieListe = $galerieManager->findAll();

        foreach ($galerieListe as $galId){
            $firstPhoto[] = $galerieManager->getFirstImage($galId['id']);
        }

		$this->show('galerie/liste',
			['galerieListe' => $galerieListe, 'firstPhoto' => $firstPhoto]);
    }
    /**
     * Page de photos de chaque galerie
     */
    public function photos($id) {
    	//echo $id;
        		
		$galerieHasPhotoManager = new GalerieHasPhotoManager();
		$photosGalerieId = $galerieHasPhotoManager->findPhotoId($id);
        //debug($photosGalerieId);
        $galerieManager = new GalerieManager();
        $galerieID = $galerieManager->find($id);
        //debug($galerieID);

        $this->show('galerie/photos',['photosGalerie' => $photosGalerieId, 'eventsIdGaleries'=> $galerieID]);
    }
     public function add(){
        $this->allowTo('2');
        $this->show('galerie/add');
    }

    public function addVal(){
        $this->allowTo('2');
        $galerieManager = new GalerieManager();

        $titreVal = false;
        $legendVal = false;
        $descriptionVal= false;
        $error = array();
        $vals = array();

        $titre = isset($_POST['titre']) ? trim(strip_tags($_POST['titre'])) : '';
        $legend = isset($_POST['legend']) ? trim(strip_tags($_POST['legend'])) : '';
        $description = isset($_POST['description']) ? trim(strip_tags($_POST['description'])) : '';

        if ($titre != '') {
            $titreVal = true;
            $vals['gal_name'] = $titre;
        }
        else{
            $error[] = 'veuillez entrer un titre';
            $vals['gal_name'] = '';
        }

        if ($legend != '') {
            $legendVal = true;
            $vals['gal_legend'] = $legend;
        }
        else{
            $error[] = 'veuillez entrer une legend';
            $vals['gal_legend'] = '';
        }

        if ($description != '') {
            $descriptionVal = true;
            $vals['gal_description'] = $description;
        }
        else{
            $error[] = 'veuillez entrer une description';
            $vals['gal_description'] = '';
        }

        if ($titreVal && $legendVal && $descriptionVal){
            debug($galerieManager);
            debug($vals);
            $galerieManager->insert($vals);
            $this->redirectToRoute('galerie_liste');
            //$this->show('galerie/update', ['error' => $error, 'vals'=>$vals]);
        }
        else{
            $this->show('galerie/add', ['error' => $error, 'vals'=>$vals]);
        }
    }

    public function deleteConfirmation($id){
        $this->allowTo('2');
        $galerieManager = new GalerieManager();
        $galerieDetailsId = $galerieManager->find($id);
        //debug($galerieDetailsId);
        $this->show('default/confirmation', ['galerieDetails' => $galerieDetailsId]);
    }
   
    public function delete($id){
        $this->allowTo('2');
        $galerieManager = new GalerieManager();
        $galerieManager->delete($id);
              
        $this->redirectToRoute('galerie_liste');
    }

    public function update($id){
        $this->allowTo('2');
        $galerieManager = new GalerieManager();
        $galerieId = $galerieManager->find($id);

        $this->show('galerie/update', ['galerieDetails' => $galerieId]);
    }

    public function updateVal($id){
        $this->allowTo('2');
        $galerieManager = new GalerieManager();
        $titreVal = false;
        $legendVal = false;
        $descriptionVal= false;
        $error = array();
        $vals = array();

        $titre = isset($_POST['titre']) ? trim(strip_tags($_POST['titre'])) : '';
        $legend = isset($_POST['legend']) ? trim(strip_tags($_POST['legend'])) : '';
        $description = isset($_POST['description']) ? trim(strip_tags($_POST['description'])) : '';

        if ($titre != '') {
            $titreVal = true;
            $vals['gal_name'] = $titre;
        }
        else{
            $error[] = 'veuillez entrer un titre';
            $vals['gal_name'] = '';
        }

        if ($legend != '') {
            $legendVal = true;
            $vals['gal_legend'] = $legend;
        }
        else{
            $error[] = 'veuillez entrer une legend';
            $vals['gal_legend'] = '';
        }

        if ($description != '') {
            $descriptionVal = true;
            $vals['gal_description'] = $description;
        }
        else{
            $error[] = 'veuillez entrer une description';
            $vals['gal_description'] = '';
        }

        if ($titreVal && $legendVal && $descriptionVal){
            
            $galerieManager->update($vals, $id);
            $this->redirectToRoute('galerie_liste');
            //$this->show('galerie/update', ['error' => $error, 'vals'=>$vals]);
        }
        else{
            $this->show('galerie/update', ['error' => $error, 'vals'=>$vals]);
        }
    }
}
