<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationManager;
use \Manager\AuthorizationManager;
use \Manager\UserManager;
use \Manager\UserHasRoleManager;


class UserController extends Controller {

    /**
     * Page d'accueil par défaut
     */
    
    public function logOut() {
        $authManager = new AuthentificationManager();
        $authManager->logUserOut();
        unset($_SESSION['roles']);
        $this->redirectToRoute('user_login');
    }
    
    public function login() {
        $this->show('default/login');
    }

    public function loginVal() {
        $usernameOrEmail = isset($_POST['usernameOrEmail']) ? trim(strip_tags($_POST['usernameOrEmail'])) : '';
        $password = isset($_POST['password']) ? trim(strip_tags($_POST['password'])) : '';
        
        $authManager = new AuthentificationManager();
        $usr_id = $authManager->isValidLoginInfo($usernameOrEmail, $password);
        
        $userHasRoleManager = new UserHasRoleManager();
        
        if ($usr_id === 0) {
            $erreur = "Login ou Mot de passe invalide";
            $this->show('default/login', ["erreur"=>$erreur]);
        } 
        else {
            $userManager = new UserManager();
            $userRoles = $userHasRoleManager->getUserRoles($usr_id);
            $authManager->logUserIn($userManager->find($usr_id));
            foreach ($userRoles as $key => $value) {
                $_SESSION['roles'][] = $value['role_id'];   
            }
            $this->redirectToRoute('home');
        }
    }

    public function signUp() {
        $this->show('default/signUp');
    }

    public static function email($to, $message, $subject=' ', $attachment1='', $attachment2='', $attachment3='', $attachment4=''){
        $mail = new \PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'concours.mondorf@gmail.com';
        $mail->Password = 'Grandtour2016';
        $mail->SMTPSecure = 'tls';
        $mail->CharSet = 'UTF-8';
        $mail->Port = 587;
        $mail->addAttachment($attachment1);
        $mail->addAttachment($attachment2);
        $mail->addAttachment($attachment3);
        $mail->addAttachment($attachment4);
        $mail->setFrom('concours.mondorf@gmail.com');
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
    }

    public function signupVal() {
        $userManager = new UserManager();
        $authManager = new AuthorizationManager();

        $usernameVal = false;
        $lastNameVal = false;
        $firstNameVal = false;
        $adressVal = false;
        $cityVal = false;
        $zipVal = false;
        $phoneVal = false;
        $mailVal = false;
        $passwordVal  = false;
        $roleVal = false;

        $attachment1 = '';
        $attachment2 = '';
        $attachment3 = '';
        $attachment4 = '';

        $username = isset($_POST['userName']) ? trim(strip_tags($_POST['userName'])) : '';
        $lastName = isset($_POST['lastName']) ? trim(strip_tags($_POST['lastName'])) : '';
        $firstName = isset($_POST['firstName']) ? trim(strip_tags($_POST['firstName'])) : '';
        $adress = isset($_POST['adress']) ? trim(strip_tags($_POST['adress'])) : '';
        $city = isset($_POST['city']) ? trim(strip_tags($_POST['city'])) : '';
        $zip = isset($_POST['postCode']) ? trim(strip_tags($_POST['postCode'])) : '';
        $phone = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : '';
        $fax = isset($_POST['fax']) ? trim(strip_tags($_POST['fax'])) : '';
        $email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';
        $password = isset($_POST['password']) ? trim(strip_tags($_POST['password'])) : '';
        $passwordVerif = isset($_POST['passwordVerif']) ? trim(strip_tags($_POST['passwordVerif'])) : '';
        $role = isset($_POST['role']) ? $_POST['role'] : array();

        $phone = str_replace(' ','',$phone);
        $fax = str_replace(' ','',$fax);

        $error = array();
        $vals = array();
        // Il manque la validation des données
        if (strlen($username) >= 5 && strlen($username) <= 45) {
            if ($userManager->usernameExists($username) == true){
                $error[] = 'username deja utilisé';
                $vals['username'] = '';
            }
            else {
                $usernameVal = true;
                $vals['username'] = $username;
            }
        }
        else{
            $error[] = 'username pas assez long ou trop long (de 5 a 45 characteères max)';
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

        if (strlen($adress) >= 5) {
            $adressVal = true;
            $vals['adress'] = $adress;
        }
        else{
            $error[] = "veuillez indiquez votre adresse";
            $vals['adress'] = '';
        }

        if (strlen($city) != '') {
            $cityVal = true;
            $vals['city'] = $city;
        }
        else{
            $error[] = "veuillez indiquez votre ville";
            $vals['city'] = '';
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
            if ($userManager->emailExists($email) == true){
                $error[] = 'email deja utilsé';
                $vals['email'] = '';
            }
            else{
                $mailVal = true;
                $vals['email'] = $email;
            }
        }
        else {
            $error[] = "l'email entré n'est pas sous le bon format";
            $vals['email'] = '';
        }
        if(preg_match('/^(?=.*\d)(?=.*[a-x])(?=.*[A-Z]).{6,}$/', $password)){
            if ($password != '' && $password == $passwordVerif) {
                $passwordVal = true;
                $vals['password'] = $password;
            }
            else{
                $error[] = "Mot de passe invalide";
                $vals['password'] = '';
            }
        }
        else{
            $error[] = "Mot de passe invalide";
            $vals['password'] = '';
        }

        if (sizeof($role) >= 1){
            $vals['role'] = array();
            $roleVal = true;
            if (in_array('participant', $role)){
                $vals['role']['participant'] = 'checked';
                $attachment1 = TMP.'/../formulaires/FR/CONCOURS-FR BIS 3-participant.pdf';
            }
            else{
                $vals['role']['participant'] = '';
            }

            if (in_array('exposant', $role)){
                $vals['role']['exposant'] = 'checked';
                $attachment2 = TMP.'/../formulaires/FR/CLASSIC DAYS-FR BIS 3-exposant.pdf';
            }
            else{
                $vals['role']['exposant'] = '';
            }

            if (in_array('sponsor', $role)){
                $vals['role']['sponsor'] = 'checked';
                $attachment3 = TMP.'/../formulaires/sponsorFR.pdf';
            }
            else{
                $vals['role']['sponsor'] = '';
            }

            if (in_array('rally', $role)){
                $vals['role']['rally'] = 'checked';
                $attachment4 = TMP.'/../formulaires/FR/GRAN TOUR-FR BIS 4-rally.pdf';
            }
            else{
                $vals['role']['rally'] = '';
            }
        }
        else{
            $vals['role'] = array();
            $vals['role']['participant'] = '';
            $vals['role']['exposant'] = '';
            $vals['role']['sponsor'] = '';
            $vals['role']['rally'] = '';
            $error[] = "Veuillez cochez une case svp";
        }

        if ($usernameVal && $lastNameVal && $firstNameVal && $adressVal && $cityVal && $zipVal && $phoneVal && $mailVal && $passwordVal && $roleVal){

            if ($userManager->insert(['use_userName' => $username, 'use_name' => $lastName, 'use_first_name' => $firstName, 'use_address' => $adress, 'use_city' => $city,'use_post_code' => $zip, 'use_phone' => $phone, 'use_fax' => $fax, 'use_email' => $email, 'use_password' => password_hash($password, PASSWORD_BCRYPT), 'use_role_opt1' => AuthorizationManager::ROLEUSER, 'use_date_creation' => date("Y-m-d", time())])) {

                $userId = $userManager->getUserId($email);
                $userHasRoleManager = new UserHasRoleManager();
                $userHasRoleManager->insert(['users_id'=>$userId['id'], 'role_id'=>AuthorizationManager::ROLEUSER]);


                self::email($email, "Voici les formulaires d'inscription au événement que vous avez selectionné a envoyer par mail une fois completer", "Formulaires d'inscription a l'événement",$attachment1, $attachment2, $attachment3, $attachment4);
                $authManager->redirectToLogin();
            }
        }
        else{
            $this->show('default/signUp', ["error"=>$error, "vals"=>$vals]);
        }
    }

    public function forgot(){
        $this->show('default/forgot');
    }

    public function forgotVal(){
        $userManager = new UserManager();
        $email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';

        $token = $userManager->setToken($email);

        if ($token == false){
            $error = "Email pas trouver";
            $this->show('default/forgot', ['error'=>$error]);
        }
        else{
            $href = $this->generateUrl('user_passReset', ['token'=>$token]);
            $actual_link = "http://$_SERVER[HTTP_HOST]$href";

            self::email($email, "Configurer votre nouveau mot de passe : <a href=\" $actual_link\">Ici</a>", 'Mot de passe oublier?');
            $this->redirectToRoute('user_login');
            echo $actual_link;
        }
    }

    public function edit(){
        $defaultController = new DefaultController();
        $defaultController->allowTo([AuthorizationManager::ROLEADMIN, AuthorizationManager::ROLEUSER]);
        $userManager = new UserManager();

        $values = $userManager->find($_SESSION['user']['id']);
        $this->show('default/edit',['values'=>$values]);
    }

    public function editVal(){
        $defaultController = new DefaultController();
        $defaultController->allowTo([AuthorizationManager::ROLEADMIN, AuthorizationManager::ROLEUSER]);
        $userManager = new UserManager();
        $authManager = new AuthentificationManager();

        $lastNameVal = false;
        $firstNameVal = false;
        $adressVal = false;
        $cityVal = false;
        $zipVal = false;
        $phoneVal = false;
        $passwordVal = false;

        $lastName = isset($_POST['lastName']) ? trim(strip_tags($_POST['lastName'])) : '';
        $firstName = isset($_POST['firstName']) ? trim(strip_tags($_POST['firstName'])) : '';
        $adress = isset($_POST['adress']) ? trim(strip_tags($_POST['adress'])) : '';
        $city = isset($_POST['city']) ? trim(strip_tags($_POST['city'])) : '';
        $zip = isset($_POST['postCode']) ? trim(strip_tags($_POST['postCode'])) : '';
        $phone = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : '';
        $fax = isset($_POST['fax']) ? trim(strip_tags($_POST['fax'])) : '';
        $password = isset($_POST['password']) ? trim(strip_tags($_POST['password'])) : '';
        $passwordVerif = isset($_POST['passwordVerif']) ? trim(strip_tags($_POST['passwordVerif'])) : '';

        $phone = str_replace(' ','',$phone);
        $fax = str_replace(' ','',$fax);

        $error = array();
        $vals = array();
        // Il manque la validation des données

        if ($lastName != '') {
            $lastNameVal = true;
            $vals['use_name'] = $lastName;
        }
        else{
            $error[] = 'veuillez indiquez votre Nom';
            $vals['use_name'] = '';
        }

        if ($firstName != '') {
            $firstNameVal = true;
            $vals['use_first_name'] = $firstName;
        }
        else{
            $error[] = "veuillez entrer votre Prenom";
            $vals['use_first_name'] = '';
        }

        if (strlen($adress) >= 5) {
            $adressVal = true;
            $vals['use_address'] = $adress;
        }
        else{
            $error[] = "veuillez indiquez votre adresse";
            $vals['use_address'] = '';
        }

        if (strlen($city) != '') {
            $cityVal = true;
            $vals['use_city'] = $city;
        }
        else{
            $error[] = "veuillez indiquez votre ville";
            $vals['use_city'] = '';
        }

        if (strlen($zip) >= 3) {
            $zipVal = true;
            $vals['use_post_code'] = $zip;
        }
        else{
            $error[] = 'veuillez indiquez votre Code postal';
            $vals['use_post_code'] = '';
        }

        if (strlen($phone) >= 5) {
            $phoneVal = true;
            $vals['use_phone'] = $phone;
        }
        else{
            $error[] = 'veuillez entrer numero de telephone valide';
            $vals['use_phone'] = '';
        }

        if (strlen($fax) >= 5) {
            $vals['use_fax'] = $fax;
        }
        else{
            $vals['use_fax'] = '';
        }

        if(preg_match('/^(?=.*\d)(?=.*[a-x])(?=.*[A-Z]).{6,}$/', $password)){
            if ($password != '' && $password == $passwordVerif) {
                $passwordVal = true;
                $vals['use_password'] = $password;
            }
            else{
                $error[] = "Mot de passe invalide";
                $vals['use_password'] = '';
            }
        }
        else{
            $error[] = "Mot de passe invalide";
            $vals['use_password'] = '';
        }


        if ($lastNameVal && $firstNameVal && $adressVal && $cityVal && $zipVal && $phoneVal && $passwordVal){
            $vals['use_password'] = password_hash($password, PASSWORD_BCRYPT);

            if ($userManager->update($vals, $_SESSION['user']['id'])) {
                $authManager->refreshUser();
                $this->redirectToRoute('home');
            }
        }
        else{
            $this->show('default/edit', ["error"=>$error, "vals"=>$vals]);
        }
    }

    public function adminEdit($id){
        $this->allowTo(['2']);
        $userManager = new UserManager();

        $values = $userManager->find($id);
        $this->show('default/edit',['values'=>$values]);
    }

    public function adminEditVal($id){
        $this->allowTo(['2']);
        $userManager = new UserManager();
        $authManager = new AuthentificationManager();

        $lastNameVal = false;
        $firstNameVal = false;
        $adressVal = false;
        $cityVal = false;
        $zipVal = false;
        $phoneVal = false;
        $passwordVal = false;

        $lastName = isset($_POST['lastName']) ? trim(strip_tags($_POST['lastName'])) : '';
        $firstName = isset($_POST['firstName']) ? trim(strip_tags($_POST['firstName'])) : '';
        $adress = isset($_POST['adress']) ? trim(strip_tags($_POST['adress'])) : '';
        $city = isset($_POST['city']) ? trim(strip_tags($_POST['city'])) : '';
        $zip = isset($_POST['postCode']) ? trim(strip_tags($_POST['postCode'])) : '';
        $phone = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : '';
        $fax = isset($_POST['fax']) ? trim(strip_tags($_POST['fax'])) : '';
        $password = isset($_POST['password']) ? trim(strip_tags($_POST['password'])) : '';
        $passwordVerif = isset($_POST['passwordVerif']) ? trim(strip_tags($_POST['passwordVerif'])) : '';

        $phone = str_replace(' ','',$phone);
        $fax = str_replace(' ','',$fax);

        $error = array();
        $vals = array();
        // Il manque la validation des données

        if ($lastName != '') {
            $lastNameVal = true;
            $vals['use_name'] = $lastName;
        }
        else{
            $error[] = 'veuillez indiquez votre Nom';
            $vals['use_name'] = '';
        }

        if ($firstName != '') {
            $firstNameVal = true;
            $vals['use_first_name'] = $firstName;
        }
        else{
            $error[] = "veuillez entrer votre Prenom";
            $vals['use_first_name'] = '';
        }

        if (strlen($adress) >= 5) {
            $adressVal = true;
            $vals['use_address'] = $adress;
        }
        else{
            $error[] = "veuillez indiquez votre adresse";
            $vals['use_address'] = '';
        }

        if (strlen($city) != '') {
            $cityVal = true;
            $vals['use_city'] = $city;
        }
        else{
            $error[] = "veuillez indiquez votre ville";
            $vals['use_city'] = '';
        }

        if (strlen($zip) >= 3) {
            $zipVal = true;
            $vals['use_post_code'] = $zip;
        }
        else{
            $error[] = 'veuillez indiquez votre Code postal';
            $vals['use_post_code'] = '';
        }

        if (strlen($phone) >= 5) {
            $phoneVal = true;
            $vals['use_phone'] = $phone;
        }
        else{
            $error[] = 'veuillez entrer numero de telephone valide';
            $vals['use_phone'] = '';
        }

        if (strlen($fax) >= 5) {
            $vals['use_fax'] = $fax;
        }
        else{
            $vals['use_fax'] = '';
        }

        if(preg_match('/^(?=.*\d)(?=.*[a-x])(?=.*[A-Z]).{6,}$/', $password)){
            if ($password != '' && $password == $passwordVerif) {
                $passwordVal = true;
                $vals['use_password'] = $password;
            }
            else{
                $error[] = "Mot de passe invalide";
                $vals['use_password'] = '';
            }
        }
        else{
            $error[] = "Mot de passe invalide";
            $vals['use_password'] = '';
        }


        if ($lastNameVal && $firstNameVal && $adressVal && $cityVal && $zipVal && $phoneVal && $passwordVal){
            $vals['use_password'] = password_hash($password, PASSWORD_BCRYPT);

            if ($userManager->update($vals, $id)) {
                $authManager->refreshUser();
                $this->redirectToRoute('home');
            }
        }
        else{
            $this->show('default/edit', ["error"=>$error, "vals"=>$vals]);
        }
    }

    public function passReset(){
        $this->show('default/resetPassword');
    }

    public function passResetVal($token){
        $userManager = new UserManager();
        $passwordVal = false;
        $password = isset($_POST['password']) ? trim(strip_tags($_POST['password'])) : '';
        $passwordVerif = isset($_POST['passwordVal']) ? trim(strip_tags($_POST['passwordVal'])) : '';

        if(preg_match('/^(?=.*\d)(?=.*[a-x])(?=.*[A-Z]).{6,}$/', $password)){
            if ($password != '' && $password == $passwordVerif) {
                $passwordVal = true;
            }
            else{
                $error[] = "Les deux mot de passe de ne sont pas les mêmes";
            }
        }
        else{
            $error[] = "Mot de passe invalide";
        }
        
        if ($passwordVal){
            $password = password_hash($password, PASSWORD_BCRYPT);
            $userManager->resetPassword($token, $password);
            $this->redirectToRoute('user_login');
        }
        else{
            $this->show('default/resetPassword',['error'=>$error]);
        }
    }
}
