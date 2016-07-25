<?php

namespace Manager;

class ExposantManager extends \W\Manager\Manager{

    function __construct(){
        parent::__construct();
        //je definis manuelement le nom de la table
        $this->setTable('exposants');
    }

    public function getUserId($email){
        $sql = "SELECT id FROM users WHERE use_email = :email";

        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':email', $email);
        $sth->execute();

        return $sth->fetch();
    }

    public function findExposantInfo($id){
        if (!is_numeric($id)){
            return false;
        }

        $sql = "SELECT * FROM " . $this->table . " WHERE users_id = :id LIMIT 1";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":id", $id);
        $sth->execute();

        return $sth->fetch();
    }
}

    
