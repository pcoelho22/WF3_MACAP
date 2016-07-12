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

}