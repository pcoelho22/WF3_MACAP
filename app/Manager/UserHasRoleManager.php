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

    public function deleteSponsor($id){
        if (!is_numeric($id)){
            return false;
        }

        $sql = "DELETE FROM " . $this->table . " WHERE users_id = :id AND role_id = ".AuthorizationManager::ROLESPONSOR;
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":id", $id);
        return $sth->execute();
    }

    public function deleteParticipant($id){
        if (!is_numeric($id)){
            return false;
        }

        $sql = "DELETE FROM " . $this->table . " WHERE users_id = :id AND role_id = ".AuthorizationManager::ROLEPARTICIPANT;
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":id", $id);
        return $sth->execute();
    }

    public function deleteExposant($id){
        if (!is_numeric($id)){
            return false;
        }

        $sql = "DELETE FROM " . $this->table . " WHERE users_id = :id AND role_id = ".AuthorizationManager::ROLEEXPOSANT;
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":id", $id);
        return $sth->execute();
    }



}


