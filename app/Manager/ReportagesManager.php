<?php

namespace Manager;

class ReportagesManager extends \W\Manager\Manager{

    function __construct(){
        parent::__construct();
        //je definis manuelement le nom de la table
        $this->setTable('contenus');
    }
    public function contenuReportages()
    {
        $sql = "
	        SELECT * 
	        FROM " . $this->table . " 
	        WHERE contenus_type_id = 2
        ";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();

        return $sth->fetchAll();
	}
	public function findReportagesId($id)
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

        return $sth->fetch();
	}
}

