<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\StringUtils;
use Manager\SponsorManager;

class SponsorController extends Controller {
    
    public function delete($id) {
        $this->allowTo('2');
        $sponsorManager = new SponsorManager();
        $sponsorManager->delete($id);
        $this->redirectToRoute('home');
    }
    
    public function add() {
        $this->allowTo('2');
        $this->show('sponsor/add');

    }  
    
    public function addVal() {
        $sponsorManager = new SponsorManager();
        $this->allowTo('2');
         
        $nameSponsorVal = false;
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

        $nameSponsor = isset($_POST['nameSponsor']) ? trim(strip_tags($_POST['nameSponsor'])) : '';
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
        $url = isset($_POST['url']) ? trim(strip_tags($_POST['url'])) : '';

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
            $error[] = "veuillez entrer le nom du sposnor";
            $vals['nameSponsor'] = '';
        }

        if ($lastNameInCharge != '') {
            $lastNameInChargeVal = true;
            $vals['lastNameInCharge'] = $lastNameInCharge;
        }
        else{
            $error[] = 'veuillez indiquez le Nom de la personne en charge';
            $vals['lastNameInCharge'] = '';
        }

        if ($firstNameInCharge != '') {
            $firstNameInChargeVal = true;
            $vals['firstNameInCharge'] = $firstNameInCharge;
        }
        else{
            $error[] = "veuillez entrer le Prenom de la personne en charge";
            $vals['firstNameInCharge'] = '';
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
        
        if (strlen($mobile) >= 5) {
            $mobileVal = true;
            $vals['mobile'] = $mobile;
        }
        else{
            $error[] = 'veuillez entrer numero de telephone valide';
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
            $error[] = "l'email in charge entré n'est pas sous le bon format";
            $vals['emailInCharge'] = '';
        }
        
        if (filter_var($emailGeneral, FILTER_VALIDATE_EMAIL)) {
            $emailGeneralVal = true;
            $vals['emailGeneral'] = $emailGeneral;
        }
        else {
            $error[] = "l'email general entré n'est pas sous le bon format";
            $vals['emailGeneral'] = '';
        }
        
        if (preg_match("~^(http|ftp)(s)?\:\/\/((([a-z0-9]{1,25})(\.)?){2,7})($|/.*$)~",$url)) {
            $urlVal = true;
            $vals['url'] = $url;
        }
        else {
            $error[] = 'url invalide';
            $vals['url'] = '';
        }

        if ($nameSponsorVal && $lastNameInChargeVal && $firstNameInChargeVal && $adressVal && $cityVal && $zipVal && $countryVal && $phoneVal && $mobileVal && $emailGeneralVal && $emailInChargeVal && $urlVal){

            if ($sponsorManager->insert([
                'spo_name_sponsors' => $nameSponsor,
                'spo_name_in_charge' => $lastNameInCharge, 
                'spo_first_name_in_charge' => $firstNameInCharge,
                'spo_address' => $adress,
                'spo_city' => $city, 
                'spo_post_code' => $zip, 
                'spo_country' => $country, 
                'spo_phone' => $phone, 
                'spo_mobile' => $mobile, 
                'spo_fax' => $fax, 
                'spo_email_incharge' => $emailInCharge, 
                'spo_email_general' => $emailGeneral, 
                'spo_url' => $url, 
                'users_id' => 1]
                )) {
                $this->redirectToRoute('home');
            }
            else{
                $error[] = "requete fail";
                $this->show('sponsor/add', ["error"=>$error, "vals"=>$vals]);
            }
        }
        else{
            $error[] = "fail inconnu";
            $this->show('sponsor/add', ["error"=>$error, "vals"=>$vals]);
        }
    }
    
    public function edit($id) {
        $this->allowTo(['2', '5']);
        $sponsorManager = new SponsorManager();
        $values = $sponsorManager->find($id);
        $this->show('sponsor/edit',['values'=>$values]);
    }
    
    public function editVal($id) {
        $sponsorManager = new SponsorManager();
        $this->allowTo(['2', '5']);
        $extensionAutorisees = array('jpg', 'jpeg', 'png', 'gif');
        $nameSponsorVal = false;
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
        $photoVal = false;

        $string = StringUtils::randomString(10);
        $string2 = StringUtils::randomString(10);

        $nameSponsor = isset($_POST['nameSponsor']) ? trim(strip_tags($_POST['nameSponsor'])) : '';
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
        $url = isset($_POST['url']) ? trim(strip_tags($_POST['url'])) : '';

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
            $error[] = "veuillez entrer le nom du sposnor";
            $vals['spo_name_sponsors'] = '';
        }

        if ($lastNameInCharge != '') {
            $lastNameInChargeVal = true;
            $vals['spo_name_in_charge'] = $lastNameInCharge;
        }
        else{
            $error[] = 'veuillez indiquez le Nom de la personne en charge';
            $vals['spo_name_in_charge'] = '';
        }

        if ($firstNameInCharge != '') {
            $firstNameInChargeVal = true;
            $vals['spo_first_name_in_charge'] = $firstNameInCharge;
        }
        else{
            $error[] = "veuillez entrer le Prenom de la personne en charge";
            $vals['spo_first_name_in_charge'] = '';
        }

        if (strlen($adress) >= 5) {
            $adressVal = true;
            $vals['spo_address'] = $adress;
        }
        else{
            $error[] = "veuillez indiquez l'adresse de l'exposant";
            $vals['spo_address'] = '';
        }
        
        if (strlen($city) >= 5) {
            $cityVal = true;
            $vals['spo_city'] = $city;
        }
        else{
            $error[] = "veuillez indiquez la ville de l'exposant";
            $vals['spo_city'] = '';
        }
        
        if (strlen($country) >= 5) {
            $countryVal = true;
            $vals['spo_country'] = $country;
        }
        else{
            $error[] = "veuillez un pays pour l'exposantt";
            $vals['spo_country'] = '';
        }

        if (strlen($zip) >= 3) {
            $zipVal = true;
            $vals['spo_post_code'] = $zip;
        }
        else{
            $error[] = 'veuillez indiquez votre Code postal';
            $vals['spo_post_code'] = '';
        }

        if (strlen($phone) >= 5) {
            $phoneVal = true;
            $vals['spo_phone'] = $phone;
        }
        else{
            $error[] = 'veuillez entrer numero de telephone valide';
            $vals['spo_phone'] = '';
        }
        
        if (strlen($mobile) >= 5) {
            $mobileVal = true;
            $vals['spo_mobile'] = $mobile;
        }
        else{
            $error[] = 'veuillez entrer numero de telephone valide';
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
            $error[] = "l'email in charge entré n'est pas sous le bon format";
            $vals['spo_email_incharge'] = '';
        }
        
        if (filter_var($emailGeneral, FILTER_VALIDATE_EMAIL)) {
            $emailGeneralVal = true;
            $vals['spo_email_general'] = $emailGeneral;
        }
        else {
            $error[] = "l'email general entré n'est pas sous le bon format";
            $vals['spo_email_general'] = '';
        }
        
        if (preg_match("~^(http|ftp)(s)?\:\/\/((([a-z0-9]{1,25})(\.)?){2,7})($|/.*$)~",$url)) {
            $urlVal = true;
            $vals['spo_url'] = $url;
        }
        else {
            $error[] = 'url invalide';
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
                            $photo = 'upload/'.$string.$string2.'.'.$extension;
                            $photoVal = true;
                            $vals['spo_avatar'] = $photo;
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

        if ($nameSponsorVal && $lastNameInChargeVal && $firstNameInChargeVal && $adressVal && $cityVal && $zipVal && $countryVal && $phoneVal && $mobileVal && $emailGeneralVal && $emailInChargeVal && $urlVal){

            if ($sponsorManager->update($vals,$id)) {
                move_uploaded_file($fichier['tmp_name'],TMP.'/upload/'.$string.$string2.'.'.$extension);
                $this->redirectToRoute('home');
            }
            else{
                $error[] = "requete fail";
                $this->show('sponsor/edit', ["error"=>$error, "vals"=>$vals]);
            }
        }
        else{
            $error[] = "fail inconnu";
            $this->show('sponsor/edit', ["error"=>$error, "vals"=>$vals]);
        }
        
    }    
}