<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthorizationManager;
use Manager\ExposantManager;

class ExposantController extends Controller {
    
    public function delete($id) {
         $exposantManager = new ExposantManager();
         $exposantManager->delete($id);
         $this->redirectToRoute('home');
    }

    public function add() {
        $authManager = new AuthorizationManager();
        //$authManager->isGranted('admin');
        $this->show('exposant/add');
    }  
    
    public function addVal() {
        $exposantManager = new ExposantManager();

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
            $error[] = "veuillez entrer le nom de l'exposant";
            $vals['nameExposant'] = '';
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
        
        if (strlen($description) >= 5) {
            $descriptionVal = true;
            $vals['description'] = $description;
        }
        else{
            $error[] = 'veuillez entrer une desciption';
            $vals['description'] = '';
        }
        
        if (preg_match("~^(http|ftp)(s)?\:\/\/((([a-z0-9]{1,25})(\.)?){2,7})($|/.*$)~",$url)) {
            $urlVal = true;
            $vals['url'] = $url;
        }
        else {
            $error[] = 'url invalide';
            $vals['url'] = '';
        }

        if ($nameExposantVal && $lastNameInChargeVal && $firstNameInChargeVal && $adressVal && $cityVal && $zipVal && $countryVal && $phoneVal && $mobileVal && $emailGeneralVal && $emailInChargeVal && $descriptionVal && $urlVal){

            if ($exposantManager->insert([
                'exp_name_eposants' => $nameExposant, 
                'exp_name_in_charge' => $lastNameInCharge, 
                'exp_firs_name_in_charge' => $firstNameInCharge, 
                'exp_adress' => $adress, 
                'exp_city' => $city, 
                'exp_post_code' => $zip, 
                'spo_Country' => $country, 
                'exp_phone' => $phone, 
                'exp_mobile' => $mobile, 
                'exp_fax' => $fax, 
                'exp_email_incharge' => $emailInCharge, 
                'exp_email_general' => $emailGeneral, 
                'exp__description_sponsors' => $description, 
                'exp_url' => $url, 
                'users_id' => 1]
                )) {
                $this->redirectToRoute('home');
            }
            else{
                $error[] = "requete fail";
                $this->show('exposant/add', ["error"=>$error, "vals"=>$vals]);
            }
        }
        else{
            $error[] = "fail inconnu";
            $this->show('exposant/add', ["error"=>$error, "vals"=>$vals]);
        }
    }
    
    public function edit($id) {
        $exposantManager = new ExposantManager();
        $values = $exposantManager->find($id);
        $this->show('exposant/edit',['values'=>$values]);
    }
    
    public function editVal($id) {
        $exposantManager = new ExposantManager();

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
            $error[] = "veuillez entrer le nom de l'exposant";
            $vals['nameExposant'] = '';
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
        
        if (strlen($description) >= 5) {
            $descriptionVal = true;
            $vals['description'] = $description;
        }
        else{
            $error[] = 'veuillez entrer une desciption';
            $vals['description'] = '';
        }
        
        if (preg_match("~^(http|ftp)(s)?\:\/\/((([a-z0-9]{1,25})(\.)?){2,7})($|/.*$)~",$url)) {
            $urlVal = true;
            $vals['url'] = $url;
        }
        else {
            $error[] = 'url invalide';
            $vals['url'] = '';
        }

        if ($nameExposantVal && $lastNameInChargeVal && $firstNameInChargeVal && $adressVal && $cityVal && $zipVal && $countryVal && $phoneVal && $mobileVal && $emailGeneralVal && $emailInChargeVal && $descriptionVal && $urlVal){

            if ($exposantManager->update([
                'exp_name_eposants' => $nameExposant, 
                'exp_name_in_charge' => $lastNameInCharge, 
                'exp_firs_name_in_charge' => $firstNameInCharge, 
                'exp_adress' => $adress, 
                'exp_city' => $city, 
                'exp_post_code' => $zip, 
                'spo_Country' => $country, 
                'exp_phone' => $phone, 
                'exp_mobile' => $mobile, 
                'exp_fax' => $fax, 
                'exp_email_incharge' => $emailInCharge, 
                'exp_email_general' => $emailGeneral, 
                'exp__description_sponsors' => $description, 
                'exp_url' => $url, 
                'users_id' => 1], 
                $id)) {
                $this->redirectToRoute('home');
            }
            else{
                $error[] = "requete fail";
                $this->show('exposant/edit', ["error"=>$error, "vals"=>$vals]);
            }
        }
        else{
            $this->show('exposant/edit', ["error"=>$error, "vals"=>$vals]);
        }
    }
}