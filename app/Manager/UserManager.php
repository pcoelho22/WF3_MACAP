<?php

namespace Manager;

class UserManager extends \W\Manager\Manager{

    function __construct(){
        parent::__construct();
        //je definis manuelement le nom de la table
        $this->setTable('users');
    }

    public function findEmail($email){
        $sql = "SELECT * FROM users WHERE use_email = :email";

        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':email', $email);
        $sth->execute();

        $retour = $sth->fetch();

        if(is_array($retour)){
            return true;
        }
        else{
            return false;
        }
    }

    public function findUserName($userName){
        $sql = "SELECT * FROM users WHERE use_userName = :userName";

        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':userName', $userName);
        $sth->execute();

        $retour = $sth->fetch();

        if(is_array($retour)){
            return true;
        }
        else{
            return false;
        }
    }

    public function setToken($email){
        $sql = "SELECT id FROM users WHERE use_email = :email";

        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':email', $email);
        $sth->execute();

        $userId = $sth->fetch();

        if (is_string($userId['id'])){
            $token = md5(time().'tokenForgotHarissa'.$email);

            $sqlUpdate = 'UPDATE users SET use_token = "'.$token.'" WHERE id = "'.$userId['id'].'"';

            $this->dbh->exec($sqlUpdate);

            return $token;
        }
        else{
            return false;
        }
    }

    public function resetPassword($token, $password){
        $sqlUpdatePassword = 'UPDATE users SET use_password = "'.$password.'" WHERE use_token = "'.$token.'"';
        $this->dbh->exec($sqlUpdatePassword);

        $sqlUpdateToken = 'UPDATE users SET use_token = "" WHERE use_token = "'.$token.'"';
        $this->dbh->exec($sqlUpdateToken);


    }
}