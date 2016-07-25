<?php

namespace Manager;

class TypeSponsorManager extends \W\Manager\Manager{

    function __construct(){
        parent::__construct();
        //je definis manuelement le nom de la table
        $this->setTable('typ_sponsors');
    }
}


