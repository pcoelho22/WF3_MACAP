<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\StringUtils;
use Manager\SponsorManager;
use \Manager\AuthorizationManager;
use \Manager\UserHasRoleManager;
use \Manager\SponsorHasTypeSponsorManager;
use \Manager\TypeSponsorManager;

class SponsorController extends Controller {
    
    public function liste() {
        $sponsorListeManager = new SponsorManager();
        $sponsorListe = $sponsorListeManager->findAll();
        //debug($sponsorListe);

        $this->show('sponsor/liste',
            ['sponsorListe' => $sponsorListe]);
    }
    public function delete($id) {
        $this->allowTo('2');
        $sponsorManager = new SponsorManager();
        $sponsorManager->delete($id);
        $userHasRoleManager = new UserHasRoleManager();
        $userHasRoleManager->deleteSponsor($id);
        $this->redirectToRoute('home');
    }
    
    public function add() {
        $this->allowTo('2');

        $typeSponsor = new TypeSponsorManager();
        $listTypeSponsor = $typeSponsor->findAll();

        $this->show('sponsor/add', ['listTypeSponsor'=>$listTypeSponsor]);

    }  
    
    public function addVal() {
        $sponsorManager = new SponsorManager();
        $this->allowTo('2');

        $typeSponsor = new TypeSponsorManager();
        $listTypeSponsor = $typeSponsor->findAll();
         
        $nameSponsorVal = false;
        $lastNameInChargeVal = false;
        $firstNameInChargeVal = false;
        $addressVal = false;
        $cityVal = false;
        $zipVal = false;
        $countryVal = false;
        $phoneVal = false;
        $mobileVal = false;
        $emailInChargeVal = false;
        $emailGeneralVal = false;
        $urlVal = false;
        $typeVal = false;

        $nameSponsor = isset($_POST['nameSponsor']) ? trim(strip_tags($_POST['nameSponsor'])) : '';
        $lastNameInCharge = isset($_POST['lastNameInCharge']) ? trim(strip_tags($_POST['lastNameInCharge'])) : '';
        $firstNameInCharge = isset($_POST['firstNameInCharge']) ? trim(strip_tags($_POST['firstNameInCharge'])) : '';
        $address = isset($_POST['address']) ? trim(strip_tags($_POST['address'])) : '';
        $city = isset($_POST['city']) ? trim(strip_tags($_POST['city'])) : '';
        $zip = isset($_POST['postCode']) ? trim(strip_tags($_POST['postCode'])) : '';
        $country = isset($_POST['country']) ? trim(strip_tags($_POST['country'])) : '';
        $phone = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : '';
        $mobile = isset($_POST['mobile']) ? trim(strip_tags($_POST['mobile'])) : '';
        $fax = isset($_POST['fax']) ? trim(strip_tags($_POST['fax'])) : '';
        $emailInCharge = isset($_POST['emailInCharge']) ? trim(strip_tags($_POST['emailInCharge'])) : '';
        $emailGeneral = isset($_POST['emailGeneral']) ? trim(strip_tags($_POST['emailGeneral'])) : '';
        $url = isset($_POST['url']) ? trim(strip_tags($_POST['url'])) : '';
        $type = isset($_POST['type']) ? trim(strip_tags($_POST['type'])) : '';

        $phone = str_replace(' ','',$phone);
        $fax = str_replace(' ','',$fax);

        $error = array();
        $vals = array();
        // Il manque la validation des données
        if ($nameSponsor != '') {
            $nameSponsorVal = true;
            $vals['nameSponsor'] = $nameSponsor;    
        }
        else{
            $error[] = "- Veuillez entrer le nom du sponsor!";
            $vals['nameSponsor'] = '';
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
            $error[] = "- Veuillez undiquer le prénom de la personne en charge!";
            $vals['firstNameInCharge'] = '';
        }

        if (strlen($address) >= 5) {
            $addressVal = true;
            $vals['address'] = $address;
        }
        else{
            $error[] = "- Veuillez indiquer l'addresse du sponsor!";
            $vals['address'] = '';
        }
        
        if (strlen($city) >= 5) {
            $cityVal = true;
            $vals['city'] = $city;
        }
        else{
            $error[] = "- Veuillez indiquer la ville du sponsor!";
            $vals['city'] = '';
        }
        
        if (strlen($country) >= 5) {
            $countryVal = true;
            $vals['country'] = $country;
        }
        else{
            $error[] = "- Veuillez indiquer le pays du sponsor!";
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
            $error[] = '- Veuillez entrer un numéro de téléphone mobile valide!';
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
        
        if (preg_match("~^(http|ftp)(s)?\:\/\/((([a-z0-9]{1,25})(\.)?){2,7})($|/.*$)~",$url)) {
            $urlVal = true;
            $vals['url'] = $url;
        }
        else {
            $error[] = '- Adresse url invalide!';
            $vals['url'] = '';
        }

        if ($type != '') {
            $typeVal = true;
            $vals['type'] = 'selected';
        }
        else{
            $error[] = "- Veuillez cocher un type de sponsor!";
            $vals['type'] = '';
        }

        if ($nameSponsorVal && $lastNameInChargeVal && $firstNameInChargeVal && $addressVal && $cityVal && $zipVal && $countryVal && $phoneVal && $mobileVal && $emailGeneralVal && $emailInChargeVal && $urlVal && $typeVal){
            $userId = $sponsorManager->getUserId($emailInCharge);

            if ($sponsorManager->insert([
                    'spo_name_sponsors' => $nameSponsor,
                    'spo_name_in_charge' => $lastNameInCharge,
                    'spo_first_name_in_charge' => $firstNameInCharge,
                    'spo_address' => $address,
                    'spo_city' => $city,
                    'spo_post_code' => $zip,
                    'spo_country' => $country,
                    'spo_phone' => $phone,
                    'spo_mobile' => $mobile,
                    'spo_fax' => $fax,
                    'spo_email_incharge' => $emailInCharge,
                    'spo_email_general' => $emailGeneral,
                    'spo_url' => $url,
                    'spo_avatar' => '/upload/default/avatar.png',
                    'users_id' => $userId['id']]
                )) {

                $userHasRoleManager = new UserHasRoleManager();
                $userHasRoleManager->insert(['users_id'=>$userId['id'], 'role_id'=>AuthorizationManager::ROLESPONSOR]);
                $sponsorId = $sponsorManager->getSponsorId($emailInCharge);
                $sponsorHasTypeManage = new SponsorHasTypeSponsorManager();
                $sponsorHasTypeManage->insert(['sponsors_id'=>$sponsorId['id'], 'sponsors_users_id'=>$userId['id'], 'typ_sponsors_id'=>$type]);

                $this->redirectToRoute('home');
            }
            else{
                $error[] = "- Requête non aboutie!";
                $this->show('sponsor/add', ["error"=>$error, "vals"=>$vals, 'listTypeSponsor'=>$listTypeSponsor]);
            }
        }
        else{
            $this->show('sponsor/add', ["error"=>$error, "vals"=>$vals, 'listTypeSponsor'=>$listTypeSponsor]);
        }
    }
    
    public function edit() {
        $defaultController = new DefaultController();
        $defaultController->allowTo([AuthorizationManager::ROLEADMIN, AuthorizationManager::ROLESPONSOR]);
        $sponsorManager = new SponsorManager();

        $typeSponsor = new TypeSponsorManager();
        $listTypeSponsor = $typeSponsor->findAll();

        $values = $sponsorManager->findSponsorInfo($_SESSION['user']['id']);
        $this->show('sponsor/edit',['values'=>$values, 'listTypeSponsor'=>$listTypeSponsor]);
    }
    
    public function editVal() {
        $defaultController = new DefaultController();
        $defaultController->allowTo([AuthorizationManager::ROLEADMIN, AuthorizationManager::ROLESPONSOR]);
        $sponsorManager = new SponsorManager();

        $typeSponsor = new TypeSponsorManager();
        $listTypeSponsor = $typeSponsor->findAll();

        $extensionAutorisees = array('jpg', 'jpeg', 'png', 'gif');
        $nameSponsorVal = false;
        $lastNameInChargeVal = false;
        $firstNameInChargeVal = false;
        $addressVal = false;
        $cityVal = false;
        $zipVal = false;
        $countryVal = false;
        $phoneVal = false;
        $mobileVal = false;
        $emailInChargeVal = false;
        $emailGeneralVal = false;
        $urlVal = false;
        $photoVal = true;

        $string = StringUtils::randomString(10);
        $string2 = StringUtils::randomString(10);

        $nameSponsor = isset($_POST['nameSponsor']) ? trim(strip_tags($_POST['nameSponsor'])) : '';
        $lastNameInCharge = isset($_POST['lastNameInCharge']) ? trim(strip_tags($_POST['lastNameInCharge'])) : '';
        $firstNameInCharge = isset($_POST['firstNameInCharge']) ? trim(strip_tags($_POST['firstNameInCharge'])) : '';
        $address = isset($_POST['address']) ? trim(strip_tags($_POST['address'])) : '';
        $city = isset($_POST['city']) ? trim(strip_tags($_POST['city'])) : '';
        $zip = isset($_POST['postCode']) ? trim(strip_tags($_POST['postCode'])) : '';
        $country = isset($_POST['country']) ? trim(strip_tags($_POST['country'])) : '';
        $phone = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : '';
        $mobile = isset($_POST['mobile']) ? trim(strip_tags($_POST['mobile'])) : '';
        $fax = isset($_POST['fax']) ? trim(strip_tags($_POST['fax'])) : '';
        $emailInCharge = isset($_POST['emailInCharge']) ? trim(strip_tags($_POST['emailInCharge'])) : '';
        $emailGeneral = isset($_POST['emailGeneral']) ? trim(strip_tags($_POST['emailGeneral'])) : '';
        $url = isset($_POST['url']) ? trim(strip_tags($_POST['url'])) : '';
        $type = isset($_POST['type']) ? trim(strip_tags($_POST['type'])) : ' ';

        $phone = str_replace(' ','',$phone);
        $fax = str_replace(' ','',$fax);

        $error = array();
        $vals = array();
        // Il manque la validation des données
        if ($nameSponsor != '') {
            $nameSponsorVal = true;
            $vals['spo_name_sponsors'] = $nameSponsor;
        }
        else{
            $error[] = "- Veuillez entrer le nom du sponsor!";
            $vals['spo_name_sponsors'] = '';
        }

        if ($lastNameInCharge != '') {
            $lastNameInChargeVal = true;
            $vals['spo_name_in_charge'] = $lastNameInCharge;
        }
        else{
            $error[] = '- Veuillez indiquer le nom de la personne en charge!';
            $vals['spo_name_in_charge'] = '';
        }

        if ($firstNameInCharge != '') {
            $firstNameInChargeVal = true;
            $vals['spo_first_name_in_charge'] = $firstNameInCharge;
        }
        else{
            $error[] = "- Veuillez entrer le prénom de la personne en charge!";
            $vals['spo_first_name_in_charge'] = '';
        }

        if (strlen($address) >= 5) {
            $addressVal = true;
            $vals['spo_address'] = $address;
        }
        else{
            $error[] = "- Veuillez indiquer l'adresse du sponsor!";
            $vals['spo_address'] = '';
        }
        
        if (strlen($city) >= 5) {
            $cityVal = true;
            $vals['spo_city'] = $city;
        }
        else{
            $error[] = "- Veuillez indiquer la ville du sponsor!";
            $vals['spo_city'] = '';
        }
        
        if (strlen($country) >= 5) {
            $countryVal = true;
            $vals['spo_country'] = $country;
        }
        else{
            $error[] = "- Veuillez indiquer un pays pour le sponsor!";
            $vals['spo_country'] = '';
        }

        if (strlen($zip) >= 3) {
            $zipVal = true;
            $vals['spo_post_code'] = $zip;
        }
        else{
            $error[] = '- Veuillez indiquer un code postal!';
            $vals['spo_post_code'] = '';
        }

        if (strlen($phone) >= 5) {
            $phoneVal = true;
            $vals['spo_phone'] = $phone;
        }
        else{
            $error[] = '- Veuillez entrer un numéro de téléphone valide!';
            $vals['spo_phone'] = '';
        }
        
        if (strlen($mobile) >= 5) {
            $mobileVal = true;
            $vals['spo_mobile'] = $mobile;
        }
        else{
            $error[] = '- Veuillez entrer un numéro de téléphone mobile valide!';
            $vals['spo_mobile'] = '';
        }

        if (strlen($fax) >= 5) {
            $vals['spo_fax'] = $fax;
        }
        else{
            $vals['spo_fax'] = '';
        }

        if (filter_var($emailInCharge, FILTER_VALIDATE_EMAIL)) {
            $emailInChargeVal = true;
            $vals['spo_email_incharge'] = $emailInCharge;
        }
        else {
            $error[] = "-L'email de la personne en charge intégré n'est pas au bon format!";
            $vals['spo_email_incharge'] = '';
        }
        
        if (filter_var($emailGeneral, FILTER_VALIDATE_EMAIL)) {
            $emailGeneralVal = true;
            $vals['spo_email_general'] = $emailGeneral;
        }
        else {
            $error[] = "-L'email général intégré n'est pas au bon format!";
            $vals['spo_email_general'] = '';
        }
        
        if (preg_match("~^(http|ftp)(s)?\:\/\/((([a-z0-9]{1,25})(\.)?){2,7})($|/.*$)~",$url)) {
            $urlVal = true;
            $vals['spo_url'] = $url;
        }
        else {
            $error[] = '- Adresse url invalide!';
            $vals['spo_url'] = '';
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
                            $photo = '/upload/sponsors/'.$string.$string2.'.'.$extension;
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

        if ($nameSponsorVal && $lastNameInChargeVal && $firstNameInChargeVal && $addressVal && $cityVal && $zipVal && $countryVal && $phoneVal && $mobileVal && $emailGeneralVal && $emailInChargeVal && $urlVal && $photoVal){

            if ($sponsorManager->update($vals,$_SESSION['user']['id'])) {
                move_uploaded_file($fichier['tmp_name'],TMP.'/upload/sponsors/'.$string.$string2.'.'.$extension);
                $this->redirectToRoute('home');
            }
            else{
                $error[] = "- Requête non aboutie!";
                $this->show('sponsor/edit', ["error"=>$error, "vals"=>$vals, 'listTypeSponsor'=>$listTypeSponsor]);
            }
        }
        else{
            $this->show('sponsor/edit', ["error"=>$error, "vals"=>$vals, 'listTypeSponsor'=>$listTypeSponsor]);
        }
        
    }

    public function adminEdit($id) {
        $this->allowTo(['2']);
        $sponsorManager = new SponsorManager();

        $typeSponsor = new TypeSponsorManager();
        $listTypeSponsor = $typeSponsor->findAll();

        $values = $sponsorManager->find($id);
        $this->show('sponsor/edit',['values'=>$values, 'listTypeSponsor'=>$listTypeSponsor]);
    }

    public function adminEditVal($id) {
        $this->allowTo(['2']);
        $sponsorManager = new SponsorManager();

        $typeSponsor = new TypeSponsorManager();
        $listTypeSponsor = $typeSponsor->findAll();

        $extensionAutorisees = array('jpg', 'jpeg', 'png', 'gif');
        $nameSponsorVal = false;
        $lastNameInChargeVal = false;
        $firstNameInChargeVal = false;
        $addressVal = false;
        $cityVal = false;
        $zipVal = false;
        $countryVal = false;
        $phoneVal = false;
        $mobileVal = false;
        $emailInChargeVal = false;
        $emailGeneralVal = false;
        $urlVal = false;
        $photoVal = true;
        $typeVal = false;

        $string = StringUtils::randomString(10);
        $string2 = StringUtils::randomString(10);

        $nameSponsor = isset($_POST['nameSponsor']) ? trim(strip_tags($_POST['nameSponsor'])) : '';
        $lastNameInCharge = isset($_POST['lastNameInCharge']) ? trim(strip_tags($_POST['lastNameInCharge'])) : '';
        $firstNameInCharge = isset($_POST['firstNameInCharge']) ? trim(strip_tags($_POST['firstNameInCharge'])) : '';
        $address = isset($_POST['address']) ? trim(strip_tags($_POST['address'])) : '';
        $city = isset($_POST['city']) ? trim(strip_tags($_POST['city'])) : '';
        $zip = isset($_POST['postCode']) ? trim(strip_tags($_POST['postCode'])) : '';
        $country = isset($_POST['country']) ? trim(strip_tags($_POST['country'])) : '';
        $phone = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : '';
        $mobile = isset($_POST['mobile']) ? trim(strip_tags($_POST['mobile'])) : '';
        $fax = isset($_POST['fax']) ? trim(strip_tags($_POST['fax'])) : '';
        $emailInCharge = isset($_POST['emailInCharge']) ? trim(strip_tags($_POST['emailInCharge'])) : '';
        $emailGeneral = isset($_POST['emailGeneral']) ? trim(strip_tags($_POST['emailGeneral'])) : '';
        $url = isset($_POST['url']) ? trim(strip_tags($_POST['url'])) : '';
        $type = isset($_POST['type']) ? trim(strip_tags($_POST['type'])) : '';

        $phone = str_replace(' ','',$phone);
        $fax = str_replace(' ','',$fax);

        $error = array();
        $vals = array();
        // Il manque la validation des données
        if ($nameSponsor != '') {
            $nameSponsorVal = true;
            $vals['spo_name_sponsors'] = $nameSponsor;
        }
        else{
            $error[] = "- Veuillez entrer le nom du sponsor!";
            $vals['spo_name_sponsors'] = '';
        }

        if ($lastNameInCharge != '') {
            $lastNameInChargeVal = true;
            $vals['spo_name_in_charge'] = $lastNameInCharge;
        }
        else{
            $error[] = '- Veuillez indiquez le nom de la personne en charge!';
            $vals['spo_name_in_charge'] = '';
        }

        if ($firstNameInCharge != '') {
            $firstNameInChargeVal = true;
            $vals['spo_first_name_in_charge'] = $firstNameInCharge;
        }
        else{
            $error[] = "- Veuillez entrer le prénom de la personne en charge!";
            $vals['spo_first_name_in_charge'] = '';
        }

        if (strlen($address) >= 5) {
            $addressVal = true;
            $vals['spo_address'] = $address;
        }
        else{
            $error[] = "- Veuillez indiquez l'adresse du sponsor!";
            $vals['spo_address'] = '';
        }

        if (strlen($city) >= 5) {
            $cityVal = true;
            $vals['spo_city'] = $city;
        }
        else{
            $error[] = "- Veuillez indiquez la ville du sponsor!";
            $vals['spo_city'] = '';
        }

        if (strlen($country) >= 5) {
            $countryVal = true;
            $vals['spo_country'] = $country;
        }
        else{
            $error[] = "- Veuillez indiquer le pays du sponsor!";
            $vals['spo_country'] = '';
        }

        if (strlen($zip) >= 3) {
            $zipVal = true;
            $vals['spo_post_code'] = $zip;
        }
        else{
            $error[] = '- Veuillez indiquer un code postal!';
            $vals['spo_post_code'] = '';
        }

        if (strlen($phone) >= 5) {
            $phoneVal = true;
            $vals['spo_phone'] = $phone;
        }
        else{
            $error[] = '- Veuillez entrer un numéro de téléphone valide!';
            $vals['spo_phone'] = '';
        }

        if (strlen($mobile) >= 5) {
            $mobileVal = true;
            $vals['spo_mobile'] = $mobile;
        }
        else{
            $error[] = '- Veuillez entrer un numéro de téléphone mobile valide!';
            $vals['spo_mobile'] = '';
        }

        if (strlen($fax) >= 5) {
            $vals['spo_fax'] = $fax;
        }
        else{
            $vals['spo_fax'] = '';
        }

        if (filter_var($emailInCharge, FILTER_VALIDATE_EMAIL)) {
            $emailInChargeVal = true;
            $vals['spo_email_incharge'] = $emailInCharge;
        }
        else {
            $error[] = "- L'email de la personne en charge intégré n'est pas au bon format!";
            $vals['spo_email_incharge'] = '';
        }

        if (filter_var($emailGeneral, FILTER_VALIDATE_EMAIL)) {
            $emailGeneralVal = true;
            $vals['spo_email_general'] = $emailGeneral;
        }
        else {
            $error[] = "- L'email général intégré n'est pas au bon format!";
            $vals['spo_email_general'] = '';
        }

        if (preg_match("~^(http|ftp)(s)?\:\/\/((([a-z0-9]{1,25})(\.)?){2,7})($|/.*$)~",$url)) {
            $urlVal = true;
            $vals['spo_url'] = $url;
        }
        else {
            $error[] = '- Adresse url invalide!';
            $vals['spo_url'] = '';
        }

        if ($type != '') {
            $typeVal = true;
        }
        else{
            $error[] = "- Veuillez cocher un type de sponsor!";
            $vals['type'] = '';
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
                            $photo = '/upload/sponsors/'.$string.$string2.'.'.$extension;
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

        if ($nameSponsorVal && $lastNameInChargeVal && $firstNameInChargeVal && $addressVal && $cityVal && $zipVal && $countryVal && $phoneVal && $mobileVal && $emailGeneralVal && $emailInChargeVal && $urlVal && $photoVal && $typeVal){

            if ($sponsorManager->update($vals,$id)) {
                move_uploaded_file($fichier['tmp_name'],TMP.'/upload/sponsors/'.$string.$string2.'.'.$extension);
                $this->redirectToRoute('home');
            }
            else{
                $error[] = "- Requête non aboutie!";
                $this->show('sponsor/edit', ["error"=>$error, "vals"=>$vals,'listTypeSponsor'=>$listTypeSponsor]);
            }
        }
        else{
            $this->show('sponsor/edit', ["error"=>$error, "vals"=>$vals, 'listTypeSponsor'=>$listTypeSponsor]);
        }

    }
}