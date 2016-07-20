<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\StringUtils;
use Manager\ParticipantManager;

class ParticipantController extends Controller {
    
    public function delete($id) {
        $this->allowTo('2');
        $participantManager = new ParticipantManager();
        $participantManager->delete($id);
        $this->redirectToRoute('home');
    }
    
    public function add() {
        $this->allowTo('2');

        $this->show('participant/add');
    }  
    
    public function addVal() {
        $this->allowTo('2');
        $participantManager = new ParticipantManager();
        
        $lastNameVal = false;
        $firstNameVal = false;
        $adressVal = false;
        $cityVal = false;
        $zipVal = false;
        $countryVal = false;
        $phoneVal = false;
        $emailVal = false;

        
        $lastName = isset($_POST['lastName']) ? trim(strip_tags($_POST['lastName'])) : '';
        $firstName = isset($_POST['firstName']) ? trim(strip_tags($_POST['firstName'])) : '';
        $adress = isset($_POST['adress']) ? trim(strip_tags($_POST['adress'])) : '';
        $city = isset($_POST['city']) ? trim(strip_tags($_POST['city'])) : '';
        $zip = isset($_POST['postCode']) ? trim(strip_tags($_POST['postCode'])) : '';
        $country = isset($_POST['country']) ? trim(strip_tags($_POST['country'])) : '';
        $phone = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : '';
        $fax = isset($_POST['fax']) ? trim(strip_tags($_POST['fax'])) : '';
        $email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';

        $phone = str_replace(' ','',$phone);
        $fax = str_replace(' ','',$fax);

        $error = array();
        $vals = array();
        
        if ($lastName != '') {
            $lastNameVal = true;
            $vals['lastName'] = $lastName;
        }
        else{
            $error[] = 'veuillez indiquez le Nom de la personne en charge';
            $vals['lastName'] = '';
        }

        if ($firstName != '') {
            $firstNameVal = true;
            $vals['firstName'] = $firstName;
        }
        else{
            $error[] = "veuillez entrer le Prenom de la personne en charge";
            $vals['firstName'] = '';
        }

        if (strlen($adress) >= 5) {
            $adressVal = true;
            $vals['adress'] = $adress;
        }
        else{
            $error[] = "veuillez indiquez l'adresse de l'exposant";
            $vals['adress'] = '';
        }
        
        if (strlen($city) >= 5) {
            $cityVal = true;
            $vals['city'] = $city;
        }
        else{
            $error[] = "veuillez indiquez la ville de l'exposant";
            $vals['city'] = '';
        }
        
        if (strlen($country) >= 5) {
            $countryVal = true;
            $vals['country'] = $country;
        }
        else{
            $error[] = "veuillez un pays pour l'exposantt";
            $vals['country'] = '';
        }

        if (strlen($zip) >= 3) {
            $zipVal = true;
            $vals['zip'] = $zip;
        }
        else{
            $error[] = 'veuillez indiquez votre Code postal';
            $vals['zip'] = '';
        }

        if (strlen($phone) >= 5) {
            $phoneVal = true;
            $vals['phone'] = $phone;
        }
        else{
            $error[] = 'veuillez entrer numero de telephone valide';
            $vals['phone'] = '';
        }

        if (strlen($fax) >= 5) {
            $vals['fax'] = $fax;
        }
        else{
            $vals['fax'] = '';
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailVal = true;
            $vals['email'] = $email;
        }
        else {
            $error[] = "l'email in charge entré n'est pas sous le bon format";
            $vals['email'] = '';
        }

        if ($lastNameVal && $firstNameVal && $adressVal && $cityVal && $zipVal && $countryVal && $phoneVal && $emailVal){

            if ($participantManager->insert([
                    'par_name' => $lastName,
                    'par_first_name' => $firstName,
                    'par_address' => $adress,
                    'par_city' => $city,
                    'par_post_code' => $zip,
                    'par_country' => $country,
                    'par_phone' => $phone,
                    'par_fax' => $fax,
                    'par_email' => $email,
                    'users_id' => 1]
                )) {
                $this->redirectToRoute('home');
            }
            else{
                $error[] = "requete fail";
                $this->show('participant/add', ["error"=>$error, "vals"=>$vals]);
            }
        }
        else{
            $error[] = "fail inconnu";
            $this->show('participant/add', ["error"=>$error, "vals"=>$vals]);
        }
    }
    
    public function edit($id) {
        $this->allowTo(['2','3']);
        $participantManager = new ParticipantManager();
        $values = $participantManager->find($id);
        $this->show('participant/edit',['values'=>$values]);
    }
    
    public function editVal($id) {
        $this->allowTo(['2','3']);
        $participantManager = new ParticipantManager();
        $extensionAutorisees = array('jpg', 'jpeg', 'png', 'gif');
        $lastNameVal = false;
        $firstNameVal = false;
        $adressVal = false;
        $cityVal = false;
        $zipVal = false;
        $countryVal = false;
        $phoneVal = false;
        $emailVal = false;

        
        $lastName = isset($_POST['lastName']) ? trim(strip_tags($_POST['lastName'])) : '';
        $firstName = isset($_POST['firstName']) ? trim(strip_tags($_POST['firstName'])) : '';
        $adress = isset($_POST['adress']) ? trim(strip_tags($_POST['adress'])) : '';
        $city = isset($_POST['city']) ? trim(strip_tags($_POST['city'])) : '';
        $zip = isset($_POST['postCode']) ? trim(strip_tags($_POST['postCode'])) : '';
        $country = isset($_POST['country']) ? trim(strip_tags($_POST['country'])) : '';
        $phone = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : '';
        $fax = isset($_POST['fax']) ? trim(strip_tags($_POST['fax'])) : '';
        $email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';

        $phone = str_replace(' ','',$phone);
        $fax = str_replace(' ','',$fax);

        $string = StringUtils::randomString(10);
        $string2 = StringUtils::randomString(10);

        $error = array();
        $vals = array();
        
        if ($lastName != '') {
            $lastNameVal = true;
            $vals['lastName'] = $lastName;
        }
        else{
            $error[] = 'veuillez indiquez le Nom de la personne en charge';
            $vals['lastName'] = '';
        }

        if ($firstName != '') {
            $firstNameVal = true;
            $vals['firstName'] = $firstName;
        }
        else{
            $error[] = "veuillez entrer le Prenom de la personne en charge";
            $vals['firstName'] = '';
        }

        if (strlen($adress) >= 5) {
            $adressVal = true;
            $vals['adress'] = $adress;
        }
        else{
            $error[] = "veuillez indiquez l'adresse de l'exposant";
            $vals['adress'] = '';
        }
        
        if (strlen($city) >= 5) {
            $cityVal = true;
            $vals['city'] = $city;
        }
        else{
            $error[] = "veuillez indiquez la ville de l'exposant";
            $vals['city'] = '';
        }
        
        if (strlen($country) >= 5) {
            $countryVal = true;
            $vals['country'] = $country;
        }
        else{
            $error[] = "veuillez un pays pour l'exposantt";
            $vals['country'] = '';
        }

        if (strlen($zip) >= 3) {
            $zipVal = true;
            $vals['zip'] = $zip;
        }
        else{
            $error[] = 'veuillez indiquez votre Code postal';
            $vals['zip'] = '';
        }

        if (strlen($phone) >= 5) {
            $phoneVal = true;
            $vals['phone'] = $phone;
        }
        else{
            $error[] = 'veuillez entrer numero de telephone valide';
            $vals['phone'] = '';
        }

        if (strlen($fax) >= 5) {
            $vals['fax'] = $fax;
        }
        else{
            $vals['fax'] = '';
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailVal = true;
            $vals['email'] = $email;
        }
        else {
            $error[] = "l'email in charge entré n'est pas sous le bon format";
            $vals['email'] = '';
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
                            $photo = 'upload/'.$string.$string2.'.'.$extension;
                            $photoVal = true;
                            $vals['par_avatar'] = $photo;
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


        if ($lastNameVal && $firstNameVal && $adressVal && $cityVal && $zipVal && $countryVal && $phoneVal && $emailVal){

            if ($participantManager->update([
                'par_name' => $lastName, 
                'par_first_name' => $firstName, 
                'par_adress' => $adress, 
                'par_city' => $city, 
                'par_post_code' => $zip, 
                'par_country' => $country, 
                'par_phone' => $phone,
                'par_fax' => $fax, 
                'par_email' => $email], $id)){
                $this->redirectToRoute('home');
            }
            else{
                $error[] = "requete fail";
                $this->show('participant/edit', ["error"=>$error, "vals"=>$vals]);
            }
        }
        else{
            $error[] = "fail inconnu";
            $this->show('participant/edit', ["error"=>$error, "vals"=>$vals]);
        }
    }  
    
}
