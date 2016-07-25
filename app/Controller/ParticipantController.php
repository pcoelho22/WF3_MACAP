<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\StringUtils;
use Manager\ParticipantManager;
use \Manager\AuthorizationManager;
use \Manager\UserHasRoleManager;

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
        $addressVal = false;
        $cityVal = false;
        $zipVal = false;
        $countryVal = false;
        $phoneVal = false;
        $emailVal = false;

        
        $lastName = isset($_POST['lastName']) ? trim(strip_tags($_POST['lastName'])) : '';
        $firstName = isset($_POST['firstName']) ? trim(strip_tags($_POST['firstName'])) : '';
        $address = isset($_POST['address']) ? trim(strip_tags($_POST['address'])) : '';
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

        if (strlen($address) >= 5) {
            $addressVal = true;
            $vals['address'] = $address;
        }
        else{
            $error[] = "veuillez indiquez l'addresse de l'exposant";
            $vals['address'] = '';
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

        if ($lastNameVal && $firstNameVal && $addressVal && $cityVal && $zipVal && $countryVal && $phoneVal && $emailVal){
            $userId = $participantManager->getUserId($email);
            if ($participantManager->insert([
                    'par_name' => $lastName,
                    'par_first_name' => $firstName,
                    'par_address' => $address,
                    'par_city' => $city,
                    'par_post_code' => $zip,
                    'par_country' => $country,
                    'par_phone' => $phone,
                    'par_fax' => $fax,
                    'par_email' => $email,
                    'par_avatar' => '/upload/default/avatar.png',
                    'users_id' => $userId['id']]
                )) {
                $userHasRoleManager = new UserHasRoleManager();
                $userHasRoleManager->insert(['users_id'=>$userId['id'], 'role_id'=>AuthorizationManager::ROLEPARTICIPANT]);
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
    
    public function edit() {
        $defaultController = new DefaultController();
        $defaultController->allowTo([AuthorizationManager::ROLEADMIN, AuthorizationManager::ROLEPARTICIPANT]);
        $participantManager = new ParticipantManager();
        $values = $participantManager->findParticipantInfo($_SESSION['user']['id']);
        $this->show('participant/edit',['values'=>$values]);
    }
    
    public function editVal() {
        $defaultController = new DefaultController();
        $defaultController->allowTo([AuthorizationManager::ROLEADMIN, AuthorizationManager::ROLEPARTICIPANT]);
        $participantManager = new ParticipantManager();
        $extensionAutorisees = array('jpg', 'jpeg', 'png', 'gif');
        $lastNameVal = false;
        $firstNameVal = false;
        $addressVal = false;
        $cityVal = false;
        $zipVal = false;
        $countryVal = false;
        $phoneVal = false;
        $emailVal = false;
        $photoVal = true;

        
        $lastName = isset($_POST['lastName']) ? trim(strip_tags($_POST['lastName'])) : '';
        $firstName = isset($_POST['firstName']) ? trim(strip_tags($_POST['firstName'])) : '';
        $address = isset($_POST['address']) ? trim(strip_tags($_POST['address'])) : '';
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

        if (strlen($address) >= 5) {
            $addressVal = true;
            $vals['address'] = $address;
        }
        else{
            $error[] = "veuillez indiquez l'addresse de l'exposant";
            $vals['address'] = '';
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
                            $photo = '/upload/participants/'.$string.$string2.'.'.$extension;
                            $vals['par_avatar'] = $photo;
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
        /*else{
            $photoVal = false;
            $error[] = 'Pas de fichier selectioné';
        }*/


        if ($lastNameVal && $firstNameVal && $addressVal && $cityVal && $zipVal && $countryVal && $phoneVal && $emailVal && $photoVal){

            if ($participantManager->update([
                'par_name' => $lastName, 
                'par_first_name' => $firstName, 
                'par_address' => $address,
                'par_city' => $city, 
                'par_post_code' => $zip, 
                'par_country' => $country, 
                'par_phone' => $phone,
                'par_fax' => $fax,
                'par_avatar' => $photo,
                'par_email' => $email], $_SESSION['user']['id'])){
                move_uploaded_file($fichier['tmp_name'],TMP.'/upload/participants/'.$string.$string2.'.'.$extension);
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

    public function adminEdit($id) {
        $this->allowTo(['2']);
        $participantManager = new ParticipantManager();
        $values = $participantManager->find($id);
        $this->show('participant/edit',['values'=>$values]);
    }

    public function adminEditVal($id) {
        $this->allowTo(['2']);
        $participantManager = new ParticipantManager();
        $extensionAutorisees = array('jpg', 'jpeg', 'png', 'gif');
        $lastNameVal = false;
        $firstNameVal = false;
        $addressVal = false;
        $cityVal = false;
        $zipVal = false;
        $countryVal = false;
        $phoneVal = false;
        $emailVal = false;
        $photoVal = true;


        $lastName = isset($_POST['lastName']) ? trim(strip_tags($_POST['lastName'])) : '';
        $firstName = isset($_POST['firstName']) ? trim(strip_tags($_POST['firstName'])) : '';
        $address = isset($_POST['address']) ? trim(strip_tags($_POST['address'])) : '';
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

        if (strlen($address) >= 5) {
            $addressVal = true;
            $vals['address'] = $address;
        }
        else{
            $error[] = "veuillez indiquez l'addresse de l'exposant";
            $vals['address'] = '';
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
                            $photo = '/upload/participants/'.$string.$string2.'.'.$extension;
                            $vals['par_avatar'] = $photo;
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
        /*else{
            $photoVal = false;
            $error[] = 'Pas de fichier selectioné';
        }*/


        if ($lastNameVal && $firstNameVal && $addressVal && $cityVal && $zipVal && $countryVal && $phoneVal && $emailVal && $photoVal){

            if ($participantManager->update([
                'par_name' => $lastName,
                'par_first_name' => $firstName,
                'par_address' => $address,
                'par_city' => $city,
                'par_post_code' => $zip,
                'par_country' => $country,
                'par_phone' => $phone,
                'par_fax' => $fax,
                'par_avatar' => $photo,
                'par_email' => $email], $id)){
                move_uploaded_file($fichier['tmp_name'],TMP.'/upload/participants/'.$string.$string2.'.'.$extension);
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
