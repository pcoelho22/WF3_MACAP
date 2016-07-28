<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\EventsManager;
use \Manager\ContenuHasGaleriesManager;
use \W\Security\StringUtils;

class EventsController extends Controller {

    /**
     * Page liste events
     */
    public function liste() {
    	$eventsManager = new EventsManager();
        $eventsListe = $eventsManager->contenuEvent();
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
        $eventsDetailsId = $eventsManager->find($id);
        //debug($eventsDetailsId);

        $contenuHasGaleriesManager = new ContenuHasGaleriesManager();
        $galeriesId = $contenuHasGaleriesManager->findGaleriesId($id);
        //debug($galeriesId);
        
        $this->show('events/eventsDetails',['eventsId' => $eventsDetailsId, 'galeriesId' => $galeriesId]);
    }
    public function add(){
        $this->allowTo('2');
        $this->show('events/add');
    }

    public function addVal(){
        $this->allowTo('2');
        $eventsManager = new EventsManager();

        $string = StringUtils::randomString(10);
        $string2 = StringUtils::randomString(10);

        $titreVal = false;
        $dateDebutVal = false;
        $dateFinVal = false;
        $synopsisVal = false;
        $descriptionVal= false;
        $photoVal = false;
        $dateDiffVal = false;
        $extensionAutorisees = array('jpg', 'jpeg', 'png', 'gif');
        $error = array();
        $vals = array();

        $titre = isset($_POST['titre']) ? trim(strip_tags($_POST['titre'])) : '';
        $dateDebut = isset($_POST['dateStart']) ? trim(strip_tags($_POST['dateStart'])) : '';
        $dateFin = isset($_POST['dateEnd']) ? trim(strip_tags($_POST['dateEnd'])) : '';
        $synopsis = isset($_POST['synopsis']) ? trim(strip_tags($_POST['synopsis'])) : '';
        $description = isset($_POST['description']) ? trim(strip_tags($_POST['description'])) : '';

        if ($titre != '') {
            $titreVal = true;
            $vals['con_title'] = $titre;
        }
        else{
            $error[] = '- Veuillez entrer un titre!';
            $vals['con_title'] = '';
        }

        if ($dateDebut != '') {
            $dateDebutVal = true;
            $vals['con_date_start'] = $dateDebut;
        }

        else{
            $error[] = '- Veuillez entrer une date de début!';
            $vals['con_date_start'] = '';
        }

        if ($dateFin != '') {
            $dateFinVal = true;
            $vals['con_date_end'] = $dateFin;
        }
        else{
            $error[] = '- Veuillez entrer une date de fin!';
            $vals['con_date_end'] = '';
        }

        if ($dateDebut <= $dateFin){
            $dateDiffVal = true;
        }
        else{
            $error[] = '- Veuillez entrer une date de début inférieure à la date de fin!';
        }

        if ($synopsis != '') {
            $synopsisVal = true;
            $vals['con_synopsis'] = $synopsis;
        }
        else{
            $error[] = '- Veuillez entrer un synopsis!';
            $vals['con_synopsis'] = '';
        }

        if ($description != '') {
            $descriptionVal = true;
            $vals['con_description'] = $description;
        }
        else{
            $error[] = '- Veuillez entrer une description!';
            $vals['con_description'] = '';
        }

        if (!empty($_FILES['avatar']['name'])) {
            foreach ($_FILES as $key => $fichier) {
                // Je teste si le fichier a été uploadé
                if (!empty($fichier) && !empty($fichier['name'])) {
                    print_r($fichier);
                    if ($fichier['size'] <= 500000) {
                        $filename = $fichier['name'];
                        $dotPos = strrpos($filename, '.');
                        $extension = strtolower(substr($filename, $dotPos+1));
                        // Je test si c'est pas un hack (sur l'extension)
                        //if (substr($fichier['name'], -4) != '.php') {
                        if (in_array($extension, $extensionAutorisees)) {
                            // Je déplace le fichier uploadé au bon endroit


                                $photo = 'upload/'.$string.$string2.'.'.$extension;
                                $photoVal = true;
                                $vals['con_avatar'] = $photo;

                        }
                        else {
                            $error[] = '- Extension de fichier interdite!';
                        }
                    }
                    else {
                        $error[] = '- Fichier trop volumineux!';
                    }
                }
            }
        }
        else{
            $error[] = '- Pas de fichier selectionné!';
        }

        if ($titreVal && $dateDebutVal && $dateFinVal && $synopsisVal && $descriptionVal && $photoVal && $dateDiffVal){
            move_uploaded_file($fichier['tmp_name'],'C:\xampp\htdocs\Back-end\Projet-Final\public\uplaod/'.$string.$string2.'.'.$extension);
            $vals['con_type'] = "Events";
            $vals['users_id'] = 1;//user connecter
            $vals['users_role_id'] = 1;//role de l'user connecter
            $vals['contenus_type_id'] = 3;
            $eventsManager->insert($vals);
            $this->redirectToRoute('events_liste');
            //$this->show('events/update', ['error' => $error, 'vals'=>$vals]);
        }
        else{
            $this->show('events/add', ['error' => $error, 'vals'=>$vals]);
        }
    }

    public function deleteConfirmation($id){
        $this->allowTo('2');

        $eventsManager = new EventsManager();
        $eventsDetailsId = $eventsManager->find($id);
        //debug($eventsDetailsId);
        $this->show('default/confirmation', ['eventsDetails' => $eventsDetailsId]);
    }
   
    public function delete($id){
        $this->allowTo('2');

        $eventsManager = new EventsManager();
        $eventsManager->delete($id);
              
        $this->redirectToRoute('events_liste');
    }

    public function update($id){
        $this->allowTo('2');

        $eventsManager = new EventsManager();
        $eventsDetailsId = $eventsManager->find($id);
        //debug ($eventsDetailsId);
        $this->show('events/update', ['eventsDetails' => $eventsDetailsId]);
    }

    public function updateVal($id){
        $this->allowTo('2');
        $eventsManager = new EventsManager();

        $string = StringUtils::randomString(10);
        $string2 = StringUtils::randomString(10);

        $titreVal = false;
        $dateDebutVal = false;
        $dateFinVal = false;
        $synopsisVal = false;
        $descriptionVal= false;
        $dateDiffVal = false;
        $photoVal = true;
        $extensionAutorisees = array('jpg', 'jpeg', 'png', 'gif');
        $error = array();
        $vals = array();

        $titre = isset($_POST['titre']) ? trim(strip_tags($_POST['titre'])) : '';
        $dateDebut = isset($_POST['dateStart']) ? trim(strip_tags($_POST['dateStart'])) : '';
        $dateFin = isset($_POST['dateEnd']) ? trim(strip_tags($_POST['dateEnd'])) : '';
        $synopsis = isset($_POST['synopsis']) ? trim(strip_tags($_POST['synopsis'])) : '';
        $description = isset($_POST['description']) ? trim(strip_tags($_POST['description'])) : '';

        if ($titre != '') {
            $titreVal = true;
            $vals['con_title'] = $titre;
        }
        else{
            $error[] = '- Veuillez entrer un titre!';
            $vals['con_title'] = '';
        }

        if ($dateDebut != '') {
            $dateDebutVal = true;
            $vals['con_date_start'] = $dateDebut;
        }
        else{
            $error[] = '- Veuillez entrer une date de début!';
            $vals['con_date_start'] = '';
        }

        if ($dateFin != '') {
            $dateFinVal = true;
            $vals['con_date_end'] = $dateFin;
        }
        else{
            $error[] = '- Veuillez entrer une date de fin!';
            $vals['con_date_end'] = '';
        }

        if ($dateDebut <= $dateFin){
            $dateDiffVal = true;
        }
        else{
            $error[] = '- Veuillez entrer une date de début inférieur à la date de fin!';
        }

        if ($synopsis != '') {
            $synopsisVal = true;
            $vals['con_synopsis'] = $synopsis;
        }
        else{
            $error[] = '- Veuillez entrer un synopsis!';
            $vals['con_synopsis'] = '';
        }

        if ($description != '') {
            $descriptionVal = true;
            $vals['con_description'] = $description;
        }
        else{
            $error[] = '- Veuillez entrer une description!';
            $vals['con_description'] = '';
        }

        if (!empty($_FILES['avatar']['name'])) {
            foreach ($_FILES as $key => $fichier) {
                // Je teste si le fichier a été uploadé
                if (!empty($fichier) && !empty($fichier['name'])) {
                    print_r($fichier);
                    if ($fichier['size'] <= 500000) {
                        $filename = $fichier['name'];
                        $dotPos = strrpos($filename, '.');
                        $extension = strtolower(substr($filename, $dotPos+1));
                        // Je test si c'est pas un hack (sur l'extension)
                        //if (substr($fichier['name'], -4) != '.php') {
                        if (in_array($extension, $extensionAutorisees)) {
                            // Je déplace le fichier uploadé au bon endroit
                            $photo = 'upload/events/'.$string.$string2.'.'.$extension;
                            $vals['con_avatar'] = $photo;
                        }
                        else {
                            $photoVal = false;
                            $error[] = '- Extension de fichier interdite!';
                        }
                    }
                    else {
                        $photoVal = false;
                        $error[] = '- Fichier trop volumineux!';
                    }
                }
            }
        }

        if ($titreVal && $dateDebutVal && $dateFinVal && $synopsisVal && $descriptionVal && $dateDiffVal && $photoVal){
            move_uploaded_file($fichier['tmp_name'],TMP.'/assets/upload/events/'.$string.$string2.'.'.$extension);
            $eventsManager->update($vals, $id);
            $this->redirectToRoute('events_liste');
            //$this->show('events/update', ['error' => $error, 'vals'=>$vals]);
        }
        else{
            $this->show('events/update', ['error' => $error, 'vals'=>$vals]);
        }
    }
}
