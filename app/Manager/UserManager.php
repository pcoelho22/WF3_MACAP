<?php

namespace Manager;

class UserManager extends \W\Manager\Manager{

    function __construct(){
        parent::__construct();
        //je definis manuelement le nom de la table
        $this->setTable('users');
    }

    /*public function findPronoPerMatch($idMatch){
        $sql = "";

        $sth = $this->dbh->prepare($sql);
        $sth->execute();

        return $sth->fetchAll();
    }*/

}