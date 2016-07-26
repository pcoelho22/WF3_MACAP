<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\MagazineManager;

class MagazineController extends Controller {

    /**

     */
    public function liste() {
    	$magazineManager = new MagazineManager();
        $magazineListe = $magazineManager->findAll();
        //debug($galerieListe);

		$this->show('magazine/liste',
			['magazineListe' => $magazineListe]);
    }

    public function add(){
        $this->allowTo('2');
        $this->show('magazine/add');
    }

    public function addVal(){
        $this->allowTo('2');
        $magazineManager = new MagazineManager();

        $extensionImg = array('jpg', 'jpeg', 'png', 'gif');
        $extensionPdf = array('pdf');

        $magNameVal = false;
        $pdfVal = false;
        $imgVal = false;

        $mag_path = '';
        $mag_couverture = '';

        $vals = array();
        $error = array();

        $magName = isset($_POST['mag_name']) ? trim(strip_tags($_POST['mag_name'])) : '';


        if ($magName != '') {
            $magNameVal = true;
            $vals['mag_name'] = $magName;
        }
        else{
            $error[] = 'veuillez indiquez le nom du magazine';
            $vals['mag_name'] = '';
        }

        if (!empty($_FILES['magazinePdf']['name'])) {
                // Je teste si le fichier a été uploadé
                if (!empty($_FILES['magazinePdf']) && !empty($_FILES['magazinePdf']['name'])) {
                    print_r($_FILES['magazinePdf']);
                    if ($_FILES['magazinePdf']['size'] <= 5000000) {
                        $filenamePdf = $_FILES['magazinePdf']['name'];
                        $dotPos = strrpos($filenamePdf, '.');
                        $extension = strtolower(substr($filenamePdf, $dotPos+1));
                        if (in_array($extension, $extensionPdf)) {
                            $pdfVal = true;
                            $mag_path = 'WF3_MACAP/magazines/'.$filenamePdf;
                        }
                        else {
                            $error[] = 'extension interdite (uniquement du pdf)';
                        }
                    }
                    else {
                        $error[] = 'le magazine souhaiter est trop lourd';
                    }
                }
        }
        else{
            $error[] = 'Pas de fichier magazine selectioné';
        }

        if (!empty($_FILES['magazineCouv']['name'])) {
                // Je teste si le fichier a été uploadé
                if (!empty($_FILES['magazineCouv']) && !empty($_FILES['magazineCouv']['name'])) {
                    print_r($_FILES['magazineCouv']);
                    if ($_FILES['magazineCouv']['size'] <= 5000000) {
                        $filenameImg = $_FILES['magazineCouv']['name'];
                        $dotPos = strrpos($filenameImg, '.');
                        $extension = strtolower(substr($filenameImg, $dotPos+1));
                        if (in_array($extension, $extensionImg)) {
                            $imgVal = true;
                            $mag_couverture = 'WF3_MACAP/magazines/'.$filenameImg;
                        }
                        else {
                            $error[] = 'extension interdite (uniquement jpg, jpeg, png, gif)';
                        }
                    }
                    else {
                        $error[] = 'la couverture du magazine souhaiter est trop lourde';
                    }
                }
        }
        else{
            $error[] = 'Pas de couverture selectioné';
        }

        if ($magNameVal && $imgVal && $pdfVal){
            if ($magazineManager->insert([
                    'mag_name' => $magName,
                    'mag_path' => $mag_path,
                    'mag_couverture' => $mag_couverture,
                    'mag_date' => date('Y-m-d')])) {
                move_uploaded_file($_FILES['magazinePdf']['tmp_name'],TMP.'/assets/WF3_MACAP/magazines/'.$filenamePdf);
                move_uploaded_file($_FILES['magazineCouv']['tmp_name'],TMP.'/assets/WF3_MACAP/magazines/'.$filenameImg);
                $this->redirectToRoute('magazine_liste');
            }
            else{
                $error[] = "requete fail";
                $this->show('magazine/add', ["error"=>$error, "vals"=>$vals]);
            }
        }
        else{
            $this->show('magazine/add', ["error"=>$error, "vals"=>$vals]);
        }
    }

    public function update($id){
        $this->allowTo('2');
        $magazineManager = new MagazineManager();

        $values = $magazineManager->find($id);
        $this->show('magazine/edit',['values'=>$values]);
    }

    public function updateVal($id){
        $this->allowTo('2');
        $magazineManager = new MagazineManager();

        $extensionImg = array('jpg', 'jpeg', 'png', 'gif');
        $extensionPdf = array('pdf');

        $magNameVal = false;
        $pdfVal = true;
        $imgVal = true;

        $vals = array();
        $error = array();

        $magName = isset($_POST['mag_name']) ? trim(strip_tags($_POST['mag_name'])) : '';

        if ($magName != '') {
            $magNameVal = true;
            $vals['mag_name'] = $magName;
        }
        else{
            $error[] = 'veuillez indiquez le nom du magazine';
            $vals['mag_name'] = '';
        }

        if (!empty($_FILES['magazinePdf']['name'])) {
            // Je teste si le fichier a été uploadé
            if (!empty($_FILES['magazinePdf']) && !empty($_FILES['magazinePdf']['name'])) {
                print_r($_FILES['magazinePdf']);
                if ($_FILES['magazinePdf']['size'] <= 5000000) {
                    $filenamePdf = $_FILES['magazinePdf']['name'];
                    $dotPos = strrpos($filenamePdf, '.');
                    $extension = strtolower(substr($filenamePdf, $dotPos+1));
                    if (in_array($extension, $extensionPdf)) {
                        $vals['mag_path'] = 'WF3_MACAP/magazines/'.$filenamePdf;
                        move_uploaded_file($_FILES['magazinePdf']['tmp_name'],TMP.'/assets/WF3_MACAP/magazines/'.$filenamePdf);
                    }
                    else {
                        $pdfVal = false;
                        $error[] = 'extension interdite (uniquement du pdf)';
                    }
                }
                else {
                    $pdfVal = false;
                    $error[] = 'le magazine souhaiter est trop lourd';
                }
            }
        }

        if (!empty($_FILES['magazineCouv']['name'])) {
            // Je teste si le fichier a été uploadé
            if (!empty($_FILES['magazineCouv']) && !empty($_FILES['magazineCouv']['name'])) {
                print_r($_FILES['magazineCouv']);
                if ($_FILES['magazineCouv']['size'] <= 5000000) {
                    $filenameImg = $_FILES['magazineCouv']['name'];
                    $dotPos = strrpos($filenameImg, '.');
                    $extension = strtolower(substr($filenameImg, $dotPos+1));
                    if (in_array($extension, $extensionImg)) {
                        $vals['mag_couverture'] = 'WF3_MACAP/magazines/'.$filenameImg;
                        move_uploaded_file($_FILES['magazineCouv']['tmp_name'],TMP.'/assets/WF3_MACAP/magazines/'.$filenameImg);
                    }
                    else {
                        $imgVal = false;
                        $error[] = 'extension interdite (uniquement jpg, jpeg, png, gif)';
                    }
                }
                else {
                    $imgVal = false;
                    $error[] = 'la couverture du magazine souhaiter est trop lourde';
                }
            }
        }

        if ($magNameVal && $imgVal && $pdfVal){
            $vals['mag_date'] = date('Y-m-d');
            if ($magazineManager->update($vals, $id)) {
                move_uploaded_file($_FILES['magazinePdf']['tmp_name'],TMP.'/assets/WF3_MACAP/magazines/'.$filenamePdf);
                move_uploaded_file($_FILES['magazineCouv']['tmp_name'],TMP.'/assets/WF3_MACAP/magazines/'.$filenameImg);
                $this->redirectToRoute('magazine_liste');
            }
            else{
                $error[] = "requete fail";
                $this->show('magazine/edit', ["error"=>$error, "vals"=>$vals]);
            }
        }
        else{
            $this->show('magazine/edit', ["error"=>$error, "vals"=>$vals]);
        }
    }

    public function delete($id){
        $this->allowTo('2');
        $magazineManager = new MagazineManager();

        $magazineManager->delete($id);

        $this->redirectToRoute('magazine_liste');
    }
    public function deleteConfirmation($id){
        $this->allowTo('2');
        $magazineManager = new MagazineManager();
        $magazineId = $magazineManager->find($id);
        //debug($magazineId);
        $this->show('default/confirmation', ['magazineId' => $magazineId]);
    }
}
