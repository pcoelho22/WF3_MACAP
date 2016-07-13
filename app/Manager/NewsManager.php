<?php

namespace Manager;

class NewsManager extends \W\Manager\Manager{

    function __construct(){
        parent::__construct();
        //je definis manuelement le nom de la table
        $this->setTable('contenus');
    }
    public function contenuNews()
    {
        $sql = "
	        SELECT * 
	        FROM " . $this->table . " 
	        WHERE contenus_type_id = 1
        ";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();

        return $sth->fetchAll();
	}
	public function findNewsId($id)
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

/*public funtion photoByIdGalerie();*/
    
