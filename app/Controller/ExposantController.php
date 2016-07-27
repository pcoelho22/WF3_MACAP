<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\StringUtils;
use Manager\ExposantManager;
use \Manager\AuthorizationManager;
use \Manager\UserHasRoleManager;

class ExposantController extends Controller {
    
    public function delete($id) {
        $this->allowTo('2');
        $exposantManager = new ExposantManager();
        $exposantManager->delete($id);
        $userHasRoleManager = new UserHasRoleManager();
        $userHasRoleManager->deleteExposant($id);
        $this->redirectToRoute('home');
    }

    public function add() {
        $this->allowTo('2');
        $this->show('exposant/add');
    }  
    
    public function addVal() {
        $exposantManager = new ExposantManager();
        $this->allowTo('2');

        $nameExposantVal = false;
        $lastNameInChargeVal = false;
        $firstNameInChargeVal = false;
        $adressVal = false;
        $cityVal = false;
        $zipVal = false;
        $countryVal = false;
        $phoneVal = false;
        $mobileVal = false;
        $emailInChargeVal = false;
        $emailGeneralVal = false;
        $urlVal = false;
        $descriptionVal = false;

        $nameExposant = isset($_POST['nameExposant']) ? trim(strip_tags($_POST['nameExposant'])) : '';
        $lastNameInCharge = isset($_POST['lastNameInCharge']) ? trim(strip_tags($_POST['lastNameInCharge'])) : '';
        $firstNameInCharge = isset($_POST['firstNameInCharge']) ? trim(strip_tags($_POST['firstNameInCharge'])) : '';
        $adress = isset($_POST['adress']) ? trim(strip_tags($_POST['adress'])) : '';
        $city = isset($_POST['city']) ? trim(strip_tags($_POST['city'])) : '';
        $zip = isset($_POST['postCode']) ? trim(strip_tags($_POST['postCode'])) : '';
        $country = isset($_POST['country']) ? trim(strip_tags($_POST['country'])) : '';
        $phone = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : '';
        $mobile = isset($_POST['mobile']) ? trim(strip_tags($_POST['mobile'])) : '';
        $fax = isset($_POST['fax']) ? trim(strip_tags($_POST['fax'])) : '';
        $emailInCharge = isset($_POST['emailInCharge']) ? trim(strip_tags($_POST['emailInCharge'])) : '';
        $emailGeneral = isset($_POST['emailGeneral']) ? trim(strip_tags($_POST['emailGeneral'])) : '';
        $description = isset($_POST['description']) ? trim(strip_tags($_POST['description'])) : '';
        $url = isset($_POST['url']) ? trim(strip_tags($_POST['url'])) : '';

        $phone = str_replace(' ','',$phone);
        $fax = str_replace(' ','',$fax);

        $error = array();
        $vals = array();
        // Il manque la validation des données
        if ($nameExposant != '') {
            $nameExposantVal = true;
            $vals['nameExposant'] = $nameExposant;    
        }
        else{
            $error[] = "- Veuillez entrer le nom de l'exposant!";
            $vals['nameExposant'] = '';
        }

        if ($lastNameInCharge != '') {
            $lastNameInChargeVal = true;
            $vals['lastNameInCharge'] = $lastNameInCharge;
        }
        else{
            $error[] = '- Veuillez indiquez le nom de la personne en charge!';
            $vals['lastNameInCharge'] = '';
        }

        if ($firstNameInCharge != '') {
            $firstNameInChargeVal = true;
            $vals['firstNameInCharge'] = $firstNameInCharge;
        }
        else{
            $error[] = "- Veuillez entrer le prénom de la personne en charge!";
            $vals['firstNameInCharge'] = '';
        }

        if (strlen($adress) >= 5) {
            $adressVal = true;
            $vals['adress'] = $adress;
        }
        else{
            $error[] = "- Veuillez indiquez l'adresse de l'exposant!";
            $vals['adress'] = '';
        }
        
        if (strlen($city) >= 5) {
            $cityVal = true;
            $vals['city'] = $city;
        }
        else{
            $error[] = "- Veuillez indiquez la ville de l'exposant!";
            $vals['city'] = '';
        }
        
        if (strlen($country) >= 5) {
            $countryVal = true;
            $vals['country'] = $country;
        }
        else{
            $error[] = "- Veuillez indiquer le pays de l'exposant!";
            $vals['country'] = '';
        }

        if (strlen($zip) >= 3) {
            $zipVal = true;
            $vals['zip'] = $zip;
        }
        else{
            $error[] = '- Veuillez indiquer un code postal!';
            $vals['zip'] = '';
        }

        if (strlen($phone) >= 5) {
            $phoneVal = true;
            $vals['phone'] = $phone;
        }
        else{
            $error[] = '- Veuillez entrer un numéro de téléphone valide!';
            $vals['phone'] = '';
        }
        
        if (strlen($mobile) >= 5) {
            $mobileVal = true;
            $vals['mobile'] = $mobile;
        }
        else{
            $error[] = '- Veuillez entrer numéro de téléphone mobile valide!';
            $vals['mobile'] = '';
        }

        if (strlen($fax) >= 5) {
            $vals['fax'] = $fax;
        }
        else{
            $vals['fax'] = '';
        }

        if (filter_var($emailInCharge, FILTER_VALIDATE_EMAIL)) {
            $emailInChargeVal = true;
            $vals['emailInCharge'] = $emailInCharge;
        }
        else {
            $error[] = "- L'email de la personne en charge intégré n'est pas au bon format!";
            $vals['emailInCharge'] = '';
        }
        
        if (filter_var($emailGeneral, FILTER_VALIDATE_EMAIL)) {
            $emailGeneralVal = true;
            $vals['emailGeneral'] = $emailGeneral;
        }
        else {
            $error[] = "- L'email général intégré n'est pas au bon format!";
            $vals['emailGeneral'] = '';
        }
        
        if (strlen($description) >= 5) {
            $descriptionVal = true;
            $vals['description'] = $description;
        }
        else{
            $error[] = '- Veuillez entrer une desciption!';
            $vals['description'] = '';
        }
        
        if (preg_match("~^(http|ftp)(s)?\:\/\/((([a-z0-9]{1,25})(\.)?){2,7})($|/.*$)~",$url)) {
            $urlVal = true;
            $vals['url'] = $url;
        }
        else {
            $error[] = '- Adresse url invalide!';
            $vals['url'] = '';
        }

        if ($nameExposantVal && $lastNameInChargeVal && $firstNameInChargeVal && $adressVal && $cityVal && $zipVal && $countryVal && $phoneVal && $mobileVal && $emailGeneralVal && $emailInChargeVal && $descriptionVal && $urlVal){

            if ($exposantManager->insert([
                    'exp_name_exposants' => $nameExposant,
                    'exp_name_in_charge' => $lastNameInCharge,
                    'exp_first_name_in_charge' => $firstNameInCharge,
                    'exp_address' => $adress,
                    'exp_city' => $city,
                    'exp_post_code' => $zip,
                    'exp_country' => $country,
                    'exp_phone' => $phone,
                    'exp_mobile' => $mobile,
                    'exp_fax' => $fax,
                    'exp_email_incharge' => $emailInCharge,
                    'exp_email_general' => $emailGeneral,
                    'exp_description_exposants' => $description,
                    'exp_url' => $url,
                    'exp_avatar' => '/upload/default/avatar.png',
                    'users_id' => 1]
                )) {
                $this->redirectToRoute('home');
            }
            else{
                $error[] = "- Requête non aboutie!";
                $this->show('exposant/add', ["error"=>$error, "vals"=>$vals]);
            }
        }
        else{
            $this->show('exposant/add', ["error"=>$error, "vals"=>$vals]);
        }
    }

    public function edit() {
        $defaultController = new DefaultController();
        $defaultController->allowTo([AuthorizationManager::ROLEADMIN, AuthorizationManager::ROLEEXPOSANT]);
        $exposantManager = new ExposantManager();
        $values = $exposantManager->findExposantInfo($_SESSION['user']['id']);
        $this->show('exposant/edit',['values'=>$values]);
    }

    public function editVal() {
        $defaultController = new DefaultController();
        $defaultController->allowTo([AuthorizationManager::ROLEADMIN, AuthorizationManager::ROLEEXPOSANT]);
        $exposantManager = new ExposantManager();
        $extensionAutorisees = array('jpg', 'jpeg', 'png', 'gif');
        $nameExposantVal = false;
        $lastNameInChargeVal = false;
        $firstNameInChargeVal = false;
        $adressVal = false;
        $cityVal = false;
        $zipVal = false;
        $countryVal = false;
        $phoneVal = false;
        $mobileVal = false;
        $emailInChargeVal = false;
        $emailGeneralVal = false;
        $urlVal = false;
        $descriptionVal = false;
        $photoVal = true;

        $string = StringUtils::randomString(10);
        $string2 = StringUtils::randomString(10);

        $nameExposant = isset($_POST['nameExposant']) ? trim(strip_tags($_POST['nameExposant'])) : '';
        $lastNameInCharge = isset($_POST['lastNameInCharge']) ? trim(strip_tags($_POST['lastNameInCharge'])) : '';
        $firstNameInCharge = isset($_POST['firstNameInCharge']) ? trim(strip_tags($_POST['firstNameInCharge'])) : '';
        $adress = isset($_POST['adress']) ? trim(strip_tags($_POST['adress'])) : '';
        $city = isset($_POST['city']) ? trim(strip_tags($_POST['city'])) : '';
        $zip = isset($_POST['postCode']) ? trim(strip_tags($_POST['postCode'])) : '';
        $country = isset($_POST['country']) ? trim(strip_tags($_POST['country'])) : '';
        $phone = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : '';
        $mobile = isset($_POST['mobile']) ? trim(strip_tags($_POST['mobile'])) : '';
        $fax = isset($_POST['fax']) ? trim(strip_tags($_POST['fax'])) : '';
        $emailInCharge = isset($_POST['emailInCharge']) ? trim(strip_tags($_POST['emailInCharge'])) : '';
        $emailGeneral = isset($_POST['emailGeneral']) ? trim(strip_tags($_POST['emailGeneral'])) : '';
        $description = isset($_POST['description']) ? trim(strip_tags($_POST['description'])) : '';
        $url = isset($_POST['url']) ? trim(strip_tags($_POST['url'])) : '';
        $role = isset($_POST['role']) ? $_POST['role'] : array();

        $phone = str_replace(' ','',$phone);
        $fax = str_replace(' ','',$fax);

        $error = array();
        $vals = array();
        // Il manque la validation des données
        if ($nameExposant != '') {
            $nameExposantVal = true;
            $vals['nameExposant'] = $nameExposant;
        }
        else{
            $error[] = "- Veuillez entrer le nom de l'exposant!";
            $vals['nameExposant'] = '';
        }

        if ($lastNameInCharge != '') {
            $lastNameInChargeVal = true;
            $vals['lastNameInCharge'] = $lastNameInCharge;
        }
        else{
            $error[] = '- Veuillez indiquez le nom de la personne en charge!';
            $vals['lastNameInCharge'] = '';
        }

        if ($firstNameInCharge != '') {
            $firstNameInChargeVal = true;
            $vals['firstNameInCharge'] = $firstNameInCharge;
        }
        else{
            $error[] = "- Veuillez entrer le prénom de la personne en charge!";
            $vals['firstNameInCharge'] = '';
        }

        if (strlen($adress) >= 5) {
            $adressVal = true;
            $vals['address'] = $adress;
        }
        else{
            $error[] = "- Veuillez indiquer l'adresse de l'exposant!";
            $vals['address'] = '';
        }

        if (strlen($city) >= 5) {
            $cityVal = true;
            $vals['city'] = $city;
        }
        else{
            $error[] = "- Veuillez indiquer la ville de l'exposant!";
            $vals['city'] = '';
        }

        if (strlen($country) >= 5) {
            $countryVal = true;
            $vals['country'] = $country;
        }
        else{
            $error[] = "- Veuillez indiquer le pays de l'exposant!";
            $vals['country'] = '';
        }

        if (strlen($zip) >= 3) {
            $zipVal = true;
            $vals['zip'] = $zip;
        }
        else{
            $error[] = '- Veuillez indiquer votre code postal!';
            $vals['zip'] = '';
        }

        if (strlen($phone) >= 5) {
            $phoneVal = true;
            $vals['phone'] = $phone;
        }
        else{
            $error[] = '- Veuillez entrer numéro de téléphone valide!';
            $vals['phone'] = '';
        }

        if (strlen($mobile) >= 5) {
            $mobileVal = true;
            $vals['mobile'] = $mobile;
        }
        else{
            $error[] = '- Veuillez entrer numéro de téléphone mobile valide!';
            $vals['mobile'] = '';
        }

        if (strlen($fax) >= 5) {
            $vals['fax'] = $fax;
        }
        else{
            $vals['fax'] = '';
        }

        if (filter_var($emailInCharge, FILTER_VALIDATE_EMAIL)) {
            $emailInChargeVal = true;
            $vals['emailInCharge'] = $emailInCharge;
        }
        else {
            $error[] = "- L'email de la personne en charge intégré n'est pas au bon format!";
            $vals['emailInCharge'] = '';
        }

        if (filter_var($emailGeneral, FILTER_VALIDATE_EMAIL)) {
            $emailGeneralVal = true;
            $vals['emailGeneral'] = $emailGeneral;
        }
        else {
            $error[] = "- L'email général intégré n'est pas au bon format!";
            $vals['emailGeneral'] = '';
        }

        if (strlen($description) >= 5) {
            $descriptionVal = true;
            $vals['description'] = $description;
        }
        else{
            $error[] = '- Veuillez entrer une desciption!';
            $vals['description'] = '';
        }

        if (preg_match("~^(http|ftp)(s)?\:\/\/((([a-z0-9]{1,25})(\.)?){2,7})($|/.*$)~",$url)) {
            $urlVal = true;
            $vals['url'] = $url;
        }
        else {
            $error[] = '- Adresse url invalide!';
            $vals['url'] = '';
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
                            $photo = 'upload/exposants/'.$string.$string2.'.'.$extension;
                            $vals['spo_avatar'] = $photo;
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

        if ($nameExposantVal && $lastNameInChargeVal && $firstNameInChargeVal && $adressVal && $cityVal && $zipVal && $countryVal && $phoneVal && $mobileVal && $emailGeneralVal && $emailInChargeVal && $descriptionVal && $urlVal && $photoVal){
            $userId = $exposantManager->getUserId($emailInCharge);
            if ($exposantManager->update([
                'exp_name_exposants' => $nameExposant,
                'exp_name_in_charge' => $lastNameInCharge,
                'exp_first_name_in_charge' => $firstNameInCharge,
                'exp_address' => $adress,
                'exp_city' => $city,
                'exp_post_code' => $zip,
                'exp_country' => $country,
                'exp_phone' => $phone,
                'exp_mobile' => $mobile,
                'exp_fax' => $fax,
                'exp_email_incharge' => $emailInCharge,
                'exp_email_general' => $emailGeneral,
                'exp_avatar' => $photo,
                'exp_description_exposants' => $description,
                'exp_url' => $url,
                'users_id'=> $userId['id']],
                $_SESSION['user']['id'])) {
                move_uploaded_file($fichier['tmp_name'],TMP.'/assets/upload/exposants/'.$string.$string2.'.'.$extension);
                $userHasRoleManager = new UserHasRoleManager();
                $userHasRoleManager->insert(['users_id'=>$userId['id'], 'role_id'=>AuthorizationManager::ROLEEXPOSANT]);
                $this->redirectToRoute('home');
            }
            else{
                $error[] = "- Requête non aboutie!";
                $this->show('exposant/edit', ["error"=>$error, "vals"=>$vals]);
            }
        }
        else{
            $this->show('exposant/edit', ["error"=>$error, "vals"=>$vals]);
        }
    }

    public function adminEdit($id) {
        $this->allowTo(['2']);
        $exposantManager = new ExposantManager();
        $values = $exposantManager->find($id);
        $this->show('exposant/edit',['values'=>$values]);
    }
    
    public function adminEditVal($id) {
        $exposantManager = new ExposantManager();
        $this->allowTo(['2']);
        $extensionAutorisees = array('jpg', 'jpeg', 'png', 'gif');
        $nameExposantVal = false;
        $lastNameInChargeVal = false;
        $firstNameInChargeVal = false;
        $adressVal = false;
        $cityVal = false;
        $zipVal = false;
        $countryVal = false;
        $phoneVal = false;
        $mobileVal = false;
        $emailInChargeVal = false;
        $emailGeneralVal = false;
        $urlVal = false;
        $descriptionVal = false;
        $photoVal = true;

        $string = StringUtils::randomString(10);
        $string2 = StringUtils::randomString(10);

        $nameExposant = isset($_POST['nameExposant']) ? trim(strip_tags($_POST['nameExposant'])) : '';
        $lastNameInCharge = isset($_POST['lastNameInCharge']) ? trim(strip_tags($_POST['lastNameInCharge'])) : '';
        $firstNameInCharge = isset($_POST['firstNameInCharge']) ? trim(strip_tags($_POST['firstNameInCharge'])) : '';
        $adress = isset($_POST['adress']) ? trim(strip_tags($_POST['adress'])) : '';
        $city = isset($_POST['city']) ? trim(strip_tags($_POST['city'])) : '';
        $zip = isset($_POST['postCode']) ? trim(strip_tags($_POST['postCode'])) : '';
        $country = isset($_POST['country']) ? trim(strip_tags($_POST['country'])) : '';
        $phone = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : '';
        $mobile = isset($_POST['mobile']) ? trim(strip_tags($_POST['mobile'])) : '';
        $fax = isset($_POST['fax']) ? trim(strip_tags($_POST['fax'])) : '';
        $emailInCharge = isset($_POST['emailInCharge']) ? trim(strip_tags($_POST['emailInCharge'])) : '';
        $emailGeneral = isset($_POST['emailGeneral']) ? trim(strip_tags($_POST['emailGeneral'])) : '';
        $description = isset($_POST['description']) ? trim(strip_tags($_POST['description'])) : '';
        $url = isset($_POST['url']) ? trim(strip_tags($_POST['url'])) : '';
        $role = isset($_POST['role']) ? $_POST['role'] : array();

        $phone = str_replace(' ','',$phone);
        $fax = str_replace(' ','',$fax);

        $error = array();
        $vals = array();
        // Il manque la validation des données
        if ($nameExposant != '') {
            $nameExposantVal = true;
            $vals['nameExposant'] = $nameExposant;    
        }
        else{
            $error[] = "- Veuillez entrer le nom de l'exposant!";
            $vals['nameExposant'] = '';
        }

        if ($lastNameInCharge != '') {
            $lastNameInChargeVal = true;
            $vals['lastNameInCharge'] = $lastNameInCharge;
        }
        else{
            $error[] = '- Veuillez indiquer le nom de la personne en charge!';
            $vals['lastNameInCharge'] = '';
        }

        if ($firstNameInCharge != '') {
            $firstNameInChargeVal = true;
            $vals['firstNameInCharge'] = $firstNameInCharge;
        }
        else{
            $error[] = "- Veuillez entrer le prénom de la personne en charge!";
            $vals['firstNameInCharge'] = '';
        }

        if (strlen($adress) >= 5) {
            $adressVal = true;
            $vals['address'] = $adress;
        }
        else{
            $error[] = "- Veuillez indiquer l'adresse de l'exposant!";
            $vals['address'] = '';
        }
        
        if (strlen($city) >= 5) {
            $cityVal = true;
            $vals['city'] = $city;
        }
        else{
            $error[] = "- Veuillez indiquer la ville de l'exposant!";
            $vals['city'] = '';
        }
        
        if (strlen($country) >= 5) {
            $countryVal = true;
            $vals['country'] = $country;
        }
        else{
            $error[] = "- Veuillez indiquer le pays de l'exposant!";
            $vals['country'] = '';
        }

        if (strlen($zip) >= 3) {
            $zipVal = true;
            $vals['zip'] = $zip;
        }
        else{
            $error[] = '- Veuillez indiquer un code postal!';
            $vals['zip'] = '';
        }

        if (strlen($phone) >= 5) {
            $phoneVal = true;
            $vals['phone'] = $phone;
        }
        else{
            $error[] = '- Veuillez entrer numéro de téléphone valide!';
            $vals['phone'] = '';
        }
        
        if (strlen($mobile) >= 5) {
            $mobileVal = true;
            $vals['mobile'] = $mobile;
        }
        else{
            $error[] = '- Veuillez entrer numéro de téléphone mobile valide!';
            $vals['mobile'] = '';
        }

        if (strlen($fax) >= 5) {
            $vals['fax'] = $fax;
        }
        else{
            $vals['fax'] = '';
        }

        if (filter_var($emailInCharge, FILTER_VALIDATE_EMAIL)) {
            $emailInChargeVal = true;
            $vals['emailInCharge'] = $emailInCharge;
        }
        else {
            $error[] = "-L'email de la personne en charge intégré n'est pas au bon format!";
            $vals['emailInCharge'] = '';
        }
        
        if (filter_var($emailGeneral, FILTER_VALIDATE_EMAIL)) {
            $emailGeneralVal = true;
            $vals['emailGeneral'] = $emailGeneral;
        }
        else {
            $error[] = "-L'email général intégré n'est pas au bon format!";
            $vals['emailGeneral'] = '';
        }
        
        if (strlen($description) >= 5) {
            $descriptionVal = true;
            $vals['description'] = $description;
        }
        else{
            $error[] = '- Veuillez entrer une desciption!';
            $vals['description'] = '';
        }
        
        if (preg_match("~^(http|ftp)(s)?\:\/\/((([a-z0-9]{1,25})(\.)?){2,7})($|/.*$)~",$url)) {
            $urlVal = true;
            $vals['url'] = $url;
        }
        else {
            $error[] = '- Adresse url invalide!';
            $vals['url'] = '';
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
                            $photo = 'upload/exposants/'.$string.$string2.'.'.$extension;
                            $vals['spo_avatar'] = $photo;
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

        if ($nameExposantVal && $lastNameInChargeVal && $firstNameInChargeVal && $adressVal && $cityVal && $zipVal && $countryVal && $phoneVal && $mobileVal && $emailGeneralVal && $emailInChargeVal && $descriptionVal && $urlVal && $photoVal){

            if ($exposantManager->update([
                'exp_name_exposants' => $nameExposant,
                'exp_name_in_charge' => $lastNameInCharge, 
                'exp_first_name_in_charge' => $firstNameInCharge,
                'exp_address' => $adress,
                'exp_city' => $city, 
                'exp_post_code' => $zip, 
                'exp_country' => $country,
                'exp_phone' => $phone, 
                'exp_mobile' => $mobile, 
                'exp_fax' => $fax, 
                'exp_email_incharge' => $emailInCharge, 
                'exp_email_general' => $emailGeneral,
                'exp_avatar' => $photo,
                'exp_description_exposants' => $description,
                'exp_url' => $url],
                $id)) {
                move_uploaded_file($fichier['tmp_name'],TMP.'/assets/upload/exposants/'.$string.$string2.'.'.$extension);
                $this->redirectToRoute('home');
            }
            else{
                $error[] = "- Requête non aboutie!";
                $this->show('exposant/edit', ["error"=>$error, "vals"=>$vals]);
            }
        }
        else{
            $this->show('exposant/edit', ["error"=>$error, "vals"=>$vals]);
        }
    }
}