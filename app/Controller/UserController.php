<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationManager;
use \W\Manager\UserManager;
use \Manager\UserManagerr;

class UserController extends Controller
{

    /**
     * Page d'accueil par défaut
     */
    public function login(){
        $this->show('default/login');
    }

    public function loginVal(){
        $usernameOrEmail = isset($_POST['usernameOrEmail']) ? trim(strip_tags($_POST['usernameOrEmail'])) : '';
        $password = isset($_POST['password']) ? trim(strip_tags($_POST['password'])) : '';

        $authManager = new AuthentificationManager();
        $usr_id = $authManager->isValidLoginInfo($usernameOrEmail, $password);

        $userManager = new UserManager();
        $foundUser = $userManager->getUserByUsernameOrEmail($usernameOrEmail);

        if($usr_id === 0){
            print_r($foundUser) ;
            echo 'Arf :: login invalide <br/>';
        }
        else{
            $userManager = new UserManager();
            $authManager->logUserIn($userManager->find($usr_id));
            $this->redirectToRoute('home');
        }
    }

    public function signUp(){
        $this->show('default/signUp');
    }

    public function signupVal(){
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

        // Il manque la validation des données

        if ($password != '' && $password == $passwordVerif) {
            $userManager = new UserManagerr();
            if ($userManager->insert(['use_userName'=>$username, 'use_name'=>$lastName, 'use_firstName'=>$firstName, 'use_adress'=>$adress, 'use_postCode'=>$zip, 'use_phone'=>$phone, 'use_fax'=>$fax, 'use_email'=>$email, 'use_password'=>password_hash($password, PASSWORD_BCRYPT), 'use_role'=>'user', 'use_dateCreation'=>time()])){
                $this->redirectToRoute('user_login');
            }
        }
        else {
            echo 'Arf :: password vide!<br />';
            exit;
        }

    }

}