<?php

namespace Manager;

class ExposantManager extends \W\Manager\Manager{

    function __construct(){
        parent::__construct();
        //je definis manuelement le nom de la table
        $this->setTable('exposants');
    }
 
}

    
