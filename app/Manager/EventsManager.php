<?php

namespace Manager;

class EventsManager extends \W\Manager\Manager{

    function __construct(){
        parent::__construct();
        //je definis manuelement le nom de la table
        $this->setTable('contenus');
    }
    public function contenuEvent()
    {
        $sql = "
	        SELECT * 
	        FROM " . $this->table . " 
	        WHERE contenus_type_id = 3
        ";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();

        return $sth->fetchAll();
	}

}