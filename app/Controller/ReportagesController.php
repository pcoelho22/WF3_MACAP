<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\ReportagesManager;
use \W\Security\StringUtils;


class ReportagesController extends Controller {

    /**
     * Page avec les reportages
     */
    public function liste() {
    	$reportagesManager = new ReportagesManager();
        $reportagesListe = $reportagesManager->contenuReportages();
        //debug($reportagesListe);

		$this->show('reportages/liste',
			['reportagesListe' => $reportagesListe]);
    }
    public function reportagesDetails($id) {
        //echo $id;
        
        $reportagesManager = new ReportagesManager();
        $reportagesDetailsId = $reportagesManager->find($id);
        //debug($reportagesDetailsId);

        $this->show('reportages/reportagesDetails',['reportagesDetails' => $reportagesDetailsId]);
    }

    public function add(){
        $this->allowTo('2');
        $this->show('reportages/add');
    }

    public function addVal(){
        $this->allowTo('2');
        $reportagesManager = new ReportagesManager();
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
            $error[] = 'veuillez entrer un titre';
            $vals['con_title'] = '';
        }

        if ($dateDebut != '') {
            $dateDebutVal = true;
            $vals['con_date_start'] = $dateDebut;
        }

        else{
            $error[] = 'veuillez entrer une date de debut';
            $vals['con_date_start'] = '';
        }

        if ($dateFin != '') {
            $dateFinVal = true;
            $vals['con_date_end'] = $dateFin;
        }
        else{
            $error[] = 'veuillez entrer une date de debut';
            $vals['con_date_end'] = '';
        }

        if ($dateDebut <= $dateFin){
            $dateDiffVal = true;
        }
        else{
            $error[] = 'veuillez entrer une date de debut plus petite que la date de fin';
        }

        if ($synopsis != '') {
            $synopsisVal = true;
            $vals['con_synopsis'] = $synopsis;
        }
        else{
            $error[] = 'veuillez entrer une synopsis';
            $vals['con_synopsis'] = '';
        }

        if ($description != '') {
            $descriptionVal = true;
            $vals['con_description'] = $description;
        }
        else{
            $error[] = 'veuillez entrer une description';
            $vals['con_description'] = '';
        }

        if (!empty($_FILES['avatar']['name'])) {
            foreach ($_FILES as $key => $fichier) {
                // Je teste si le fichier a été uploadé
                if (!empty($fichier) && !empty($fichier['name'])) {
                    //print_r($fichier);
                    if ($fichier['size'] <= 500000) {
                        $filename = $fichier['name'];
                        $dotPos = strrpos($filename, '.');
                        $extension = strtolower(substr($filename, $dotPos+1));
                        if (in_array($extension, $extensionAutorisees)) {
                                $photo = 'upload/reportages/'.$string.$string2.'.'.$extension;
                                $photoVal = true;
                                $vals['con_avatar'] = $photo;

                        }
                        else {
                            $error[] = 'extension interdite';
                        }
                    }
                    else {
                        $error[] = 'fichier trop lourd';
                    }
                }
            }
        }
        else{
            $error[] = 'Pas de fichier selectioné';
        }

        if ($titreVal && $dateDebutVal && $dateFinVal && $synopsisVal && $descriptionVal && $photoVal && $dateDiffVal){
            move_uploaded_file($fichier['tmp_name'],TMP.'/upload/reportages/'.$string.$string2.'.'.$extension);
            $vals['con_type'] = "Reportages";
            $vals['users_id'] = 1;//user connecter
            $vals['users_role_id'] = 1;//role de l'user connecter
            $vals['contenus_type_id'] = 2;
            $reportagesManager->insert($vals);
            $this->redirectToRoute('reportages_liste');
            //$this->show('reportages/update', ['error' => $error, 'vals'=>$vals]);
        }
        else{
            $this->show('reportages/add', ['error' => $error, 'vals'=>$vals]);
        }
    }

    public function deleteConfirmation($id){
        $this->allowTo('2');
        $reportagesmanager = new ReportagesManager();
        $reportagesDetailsId = $reportagesmanager->find($id);
        //debug($reportagesDetailsId);
        $this->show('default/confirmation', ['reportagesDetails' => $reportagesDetailsId]);
    }
   
    public function delete($id){
        $this->allowTo('2');
        $reportagesmanager = new ReportagesManager();
        $reportagesmanager->delete($id);
            
        $this->redirectToRoute('reportages_liste');
    }

    public function update($id){
        $this->allowTo('2');
        $reportagesManager = new ReportagesManager();
        $reportagesDetailsId = $reportagesManager->find($id);

        $this->show('reportages/update', ['reportagesDetails' => $reportagesDetailsId]);
    }

    public function updateVal($id){
        $this->allowTo('2');
        $reportagesManager = new ReportagesManager();
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

        $string = StringUtils::randomString(10);
        $string2 = StringUtils::randomString(10);

        if ($titre != '') {
            $titreVal = true;
            $vals['con_title'] = $titre;
        }
        else{
            $error[] = 'veuillez entrer un titre';
            $vals['con_title'] = '';
        }

        if ($dateDebut != '') {
            $dateDebutVal = true;
            $vals['con_date_start'] = $dateDebut;
        }
        else{
            $error[] = 'veuillez entrer une date de debut';
            $vals['con_date_start'] = '';
        }

        if ($dateFin != '') {
            $dateFinVal = true;
            $vals['con_date_end'] = $dateFin;
        }
        else{
            $error[] = 'veuillez entrer une date de debut';
            $vals['con_date_end'] = '';
        }

        if ($dateDebut <= $dateFin){
            $dateDiffVal = true;
        }
        else{
            $error[] = 'veuillez entrer une date de debut plus petite que la date de fin';
        }

        if ($synopsis != '') {
            $synopsisVal = true;
            $vals['con_synopsis'] = $synopsis;
        }
        else{
            $error[] = 'veuillez entrer une synopsis';
            $vals['con_synopsis'] = '';
        }

        if ($description != '') {
            $descriptionVal = true;
            $vals['con_description'] = $description;
        }
        else{
            $error[] = 'veuillez entrer une description';
            $vals['con_description'] = '';
        }

        if (!empty($_FILES['avatar']['name'])) {
            foreach ($_FILES as $key => $fichier) {
                // Je teste si le fichier a été uploadé
                if (!empty($fichier) && !empty($fichier['name'])) {
                   // print_r($fichier);
                    if ($fichier['size'] <= 500000) {
                        $filename = $fichier['name'];
                        $dotPos = strrpos($filename, '.');
                        $extension = strtolower(substr($filename, $dotPos+1));
                        if (in_array($extension, $extensionAutorisees)) {
                            $photo = 'upload/reportages/'.$string.$string2.'.'.$extension;
                            $vals['con_avatar'] = $photo;
                        }
                        else {
                            $photoVal = false;
                            $error[] = 'extension interdite';
                        }
                    }
                    else {
                        $photoVal = false;
                        $error[] = 'fichier trop lourd';
                    }
                }
            }
        }

        if ($titreVal && $dateDebutVal && $dateFinVal && $synopsisVal && $descriptionVal && $dateDiffVal && $photoVal){
            move_uploaded_file($fichier['tmp_name'],TMP.'/upload/reportages/'.$string.$string2.'.'.$extension);
            $reportagesManager->update($vals, $id);
            $this->redirectToRoute('reportages_liste');
            //$this->show('reportages/update', ['error' => $error, 'vals'=>$vals]);
        }
        else{
            $this->show('reportages/update', ['error' => $error, 'vals'=>$vals]);
        }
    }
}
