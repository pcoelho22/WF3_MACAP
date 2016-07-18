<?php

namespace Manager;

class ParticipantManager extends \W\Manager\Manager{

    function __construct(){
        parent::__construct();
        //je definis manuelement le nom de la table
        $this->setTable('participants');
    }
    
    
}

    
