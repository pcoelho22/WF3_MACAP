<?php

namespace Manager;

class UserHasRoleManager extends \W\Manager\Manager{

    function __construct(){
        parent::__construct();
        //je definis manuelement le nom de la table
        $this->setTable('users_has_role');
    }

    public function getUserRoles($id){
        $sql = "
	        SELECT * 
	        FROM " . $this->table .
            " WHERE users_id = :id";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":id", $id);
        $sth->execute();

        return $sth->fetchAll();
    }


}


