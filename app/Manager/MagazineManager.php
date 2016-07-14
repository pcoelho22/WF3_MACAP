<?php

namespace Manager;

class MagazineManager extends \W\Manager\Manager{

    function __construct(){
        parent::__construct();
        //je definis manuelement le nom de la table
        $this->setTable('magazine');
    }
    public function contenuMagazine()
    {
        $sql = "
	        SELECT * 
	        FROM " . $this->table ;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();

        return $sth->fetchAll();
	}
	public function findMagazineId($id)
    {
        if (!is_numeric($id)){
            return false;
        }

        $sql = "
        SELECT * 
        FROM " . $this->table . " 
        WHERE id = :id
        ";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":id", $id);
        $sth->execute();

        return $sth->fetchAll();
	}
}

