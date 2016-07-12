<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationManager;
use \Manager\UserManager;

class UserController extends Controller {

    /**
     * Page d'accueil par défaut
     */
    public function login() {
        $this->show('default/login');
    }

    public function loginVal() {
        $usernameOrEmail = isset($_POST['usernameOrEmail']) ? trim(strip_tags($_POST['usernameOrEmail'])) : '';
        $password = isset($_POST['password']) ? trim(strip_tags($_POST['password'])) : '';

        $authManager = new AuthentificationManager();
        $usr_id = $authManager->isValidLoginInfo($usernameOrEmail, $password);

        if ($usr_id === 0) {
            $erreur = "Login ou Mot de passe invalide";
            $this->show('default/login', ["erreur"=>$erreur]);
        } else {
            $userManager = new UserManager();
            $authManager->logUserIn($userManager->find($usr_id));
            $this->redirectToRoute('home');
        }
    }

    public function signUp() {
        $this->show('default/signUp');
    }

    public function signupVal() {

        $usernameVal = false;
        $lastNameVal = false;
        $firstNameVal = false;
        $adressVal = false;
        $zipVal = false;
        $phoneVal = false;
        $faxVal = false;
        $mailVal = false;
        $passwordVal  = false;

        $username = isset($_POST['userName']) ? trim(strip_tags($_POST['userName'])) : '';
        $lastName = isset($_POST['lastName']) ? trim(strip_tags($_POST['lastName'])) : '';
        $firstName = isset($_POST['firstName']) ? trim(strip_tags($_POST['firstName'])) : '';
        $adress = isset($_POST['adress']) ? trim(strip_tags($_POST['adress'])) : '';
        $zip = isset($_POST['postCode']) ? trim(strip_tags($_POST['postCode'])) : '';
        $phone = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : '';
        $fax = isset($_POST['fax']) ? trim(strip_tags($_POST['fax'])) : '';
        $email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';
        $password = isset($_POST['password']) ? trim(strip_tags($_POST['password'])) : '';
        $passwordVerif = isset($_POST['passwordVerif']) ? trim(strip_tags($_POST['passwordVerif'])) : '';

        $error = array();
        $vals = array();
        // Il manque la validation des données
        if (strlen($username) >= 5) {
            $usernameVal = true;
            $vals['username'] = $username;
        }
        else{
            $error[] = 'username pas assez long';
            $vals['username'] = '';
        }

        if ($lastName != '') {
            $lastNameVal = true;
            $vals['lastName'] = $lastName;
        }
        else{
            $error[] = 'veuillez indiquez votre Nom';
            $vals['lastName'] = '';
        }

        if ($firstName != '') {
            $firstNameVal = true;
            $vals['firstName'] = $firstName;
        }
        else{
            $error[] = "veuillez entrer votre Prenom";
            $vals['firstName'] = '';
        }

        if (strlen($adress) >= 10) {
            $adressVal = true;
            $vals['adress'] = $adress;
        }
        else{
            $error[] = "veuillez indiquez votre code adresse";
            $vals['adress'] = '';
        }

        if (strlen($zip) >= 4) {
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
            $faxVal = true;
            $vals['fax'] = $fax;
        }
        else{
            $error[] = 'veuillez entrer un numero de fax valide';
            $vals['fax'] = '';
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mailVal = true;
            $vals['email'] = $email;
        }
        else {
            $error[] = 'veuillez entrer un email correcte';
            $vals['email'] = '';
        }

        if ($password != '' && $password == $passwordVerif) {
            $passwordVal = true;
            $vals['password'] = $password;
        }
        else{
            $error[] = "Mot de passe invalide";
            $vals['password'] = '';
        }

        if ($usernameVal && $lastNameVal && $firstNameVal && $adressVal && $zipVal && $phoneVal && $faxVal && $mailVal && $passwordVal){
            $userManager = new UserManager();
            if ($userManager->insert(['use_userName' => $username, 'use_name' => $lastName, 'use_firstName' => $firstName, 'use_adress' => $adress, 'use_post_code' => $zip, 'use_phone' => $phone, 'use_fax' => $fax, 'use_email' => $email, 'use_password' => password_hash($password, PASSWORD_BCRYPT), 'use_role_opt1' => 'user', 'use_date_creation' => time()])) {
                $this->redirectToRoute('user_login');
            }
        }
        else{
            $this->show('default/signUp', ["error"=>$error, "vals"=>$vals]);
        }
    }
}
