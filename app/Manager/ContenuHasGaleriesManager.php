<?php

namespace Manager;

class ContenuHasGaleriesManager extends \W\Manager\Manager{

    function __construct(){
        parent::__construct();
        //je definis manuelement le nom de la table
        $this->setTable('contenus_has_galeries');
    }

    public function findGaleriesId($id)
    {
        if (!is_numeric($id)){
            return false;
        }

        $sql = "
        SELECT * 
        FROM " . $this->table . " 
        INNER JOIN galeries ON galeries.id = contenus_has_galeries.galeries_id
        WHERE galeries_id = :id"
        ;
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":id", $id);
        $sth->execute();

        return $sth->fetchAll();
	}
}

