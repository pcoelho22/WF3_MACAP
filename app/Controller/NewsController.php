<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\NewsManager;
use \W\Security\StringUtils;


class NewsController extends Controller {

    /**
     * Page avec news
     */
    public function liste() {
    	$newsManager = new NewsManager();
        $newsListe = $newsManager->contenuNews();
        //debug($newsListe);

		$this->show('news/liste',
			['newsListe' => $newsListe]);
    }
    /**
     * Page de newsDetails de chaque news
     */
    public function newsDetails($id) {
    	//echo $id;
		
		$newsManager = new NewsManager();
		$newsDetailsId = $newsManager->find($id);
        //debug($newsDetailsId);

        $this->show('news/newsDetails',['newsDetails' => $newsDetailsId]);
    }

    public function add(){
        $this->allowTo('2');
        $this->show('news/add');
    }

    public function addVal(){
        $this->allowTo('2');
        $newsManager = new NewsManager();
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
            move_uploaded_file($fichier['tmp_name'],TMP.'/upload/'.$string.$string2.'.'.$extension);
            $vals['con_type'] = "News";
            $vals['users_id'] = 1;//user connecter
            $vals['users_role_id'] = 1;//role de l'user connecter
            $vals['contenus_type_id'] = 1;
            $vals['con_avatar'] = '/upload/default/avatar.png';
            $newsManager->insert($vals);
            $this->redirectToRoute('news_liste');
            //$this->show('news/update', ['error' => $error, 'vals'=>$vals]);
        }
        else{
            $this->show('news/add', ['error' => $error, 'vals'=>$vals]);
        }
    }

    public function deleteConfirmation($id){
        $this->allowTo('2');
        $newsManager = new NewsManager();
        $newsDetailsId = $newsManager->find($id);
        //debug($newsDetailsId);
        $this->show('default/confirmation', ['newsDetails' => $newsDetailsId]);
    }
   
    public function delete($id){
        $this->allowTo('2');
        $newsManager = new NewsManager();
        $newsManager->delete($id);
              
        $this->redirectToRoute('news_liste');
    }
   

    public function update($id){
        $this->allowTo('2');
        $newsManager = new NewsManager();
        $newsDetailsId = $newsManager->find($id);

        $this->show('news/update', ['newsDetails' => $newsDetailsId]);
    }

    public function updateVal($id){
        $this->allowTo('2');
        $newsManager = new NewsManager();
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
                    print_r($fichier);
                    if ($fichier['size'] <= 500000) {
                        $filename = $fichier['name'];
                        $dotPos = strrpos($filename, '.');
                        $extension = strtolower(substr($filename, $dotPos+1));
                        if (in_array($extension, $extensionAutorisees)) {
                            // Je déplace le fichier uploadé au bon endroit
                            $photo = 'upload/news/'.$string.$string2.'.'.$extension;
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
            move_uploaded_file($fichier['tmp_name'],TMP.'/upload/news/'.$string.$string2.'.'.$extension);
            $newsManager->update($vals, $id);
            $this->redirectToRoute('news_liste');
            //$this->show('news/update', ['error' => $error, 'vals'=>$vals]);
        }
        else{
            $this->show('news/update', ['error' => $error, 'vals'=>$vals]);
        }
    }
}
