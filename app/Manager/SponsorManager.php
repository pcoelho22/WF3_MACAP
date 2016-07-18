<?php

namespace Manager;

class SponsorManager extends \W\Manager\Manager{

    function __construct(){
        parent::__construct();
        //je definis manuelement le nom de la table
        $this->setTable('sponsors');
    }
    
    
}

    
