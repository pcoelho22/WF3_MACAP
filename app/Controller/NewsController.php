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
    	$newsListeManager = new NewsManager();
        $newsListe = $newsListeManager->contenuNews();
        //debug($newsListe);

		$this->show('news/liste',
			['newsListe' => $newsListe]);
    }
    /**
     * Page de newsDetails de chaque news
     */
    public function newsDetails($id) {
    	//echo $id;
		
		$newsDetailsID = new NewsManager();
		$newsDetailsId = $newsDetailsID->findNewsId($id);
        //debug($newsDetailsId);

        $this->show('news/newsDetails',['newsDetails' => $newsDetailsId]);
    }

    public function add(){
        $this->show('news/add');
    }

    public function addVal(){
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
            $vals['con_dateStart'] = $dateDebut;
        }

        else{
            $error[] = 'veuillez entrer une date de debut';
            $vals['con_dateStart'] = '';
        }

        if ($dateFin != '') {
            $dateFinVal = true;
            $vals['con_dateEnd'] = $dateFin;
        }
        else{
            $error[] = 'veuillez entrer une date de debut';
            $vals['con_dateEnd'] = '';
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
            $newsManager->insert($vals);
            $this->redirectToRoute('news_liste');
            //$this->show('news/update', ['error' => $error, 'vals'=>$vals]);
        }
        else{
            $this->show('news/add', ['error' => $error, 'vals'=>$vals]);
        }
    }

    public function delete($id){

        $newsDetailsID = new NewsManager();
        $newsDetailsID->delete($id);

        $this->redirectToRoute('news_liste');
    }

    public function update($id){

        $newsDetailsID = new NewsManager();
        $newsDetailsId = $newsDetailsID->findNewsId($id);

        $this->show('news/update', ['newsDetails' => $newsDetailsId]);
    }

    public function updateVal($id){
        $newsManager = new NewsManager();

        $titreVal = false;
        $dateDebutVal = false;
        $dateFinVal = false;
        $synopsisVal = false;
        $descriptionVal= false;
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
            $vals['con_dateStart'] = $dateDebut;
        }
        else{
            $error[] = 'veuillez entrer une date de debut';
            $vals['con_dateStart'] = '';
        }

        if ($dateFin != '') {
            $dateFinVal = true;
            $vals['con_dateEnd'] = $dateFin;
        }
        else{
            $error[] = 'veuillez entrer une date de debut';
            $vals['con_dateEnd'] = '';
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
                            if (move_uploaded_file($fichier['tmp_name'],'C:\xampp\htdocs\Back-end\Projet-Final\public\uplaod/'.$titre.$id.'.'.$extension)) {
                                $titre = str_ireplace(" ", '', $titre);
                                $photo = 'upload/'.$titre.$id.'.'.$extension;
                                echo 'fichier téléversé<br />';
                                $vals['con_avatar'] = $photo;
                            }
                            else {
                                $error[] = 'une erreur est survenue';
                            }
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

        if ($titreVal && $dateDebutVal && $dateFinVal && $synopsisVal && $descriptionVal && $dateDiffVal){
            $newsManager->update($vals, $id);
            $this->redirectToRoute('news_liste');
            //$this->show('news/update', ['error' => $error, 'vals'=>$vals]);
        }
        else{
            $this->show('news/update', ['error' => $error, 'vals'=>$vals]);
        }
    }
}
