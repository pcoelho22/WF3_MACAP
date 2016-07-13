<?php

namespace Manager;

class NewsManager extends \W\Manager\Manager{

    function __construct(){
        parent::__construct();
        //je definis manuelement le nom de la table
        $this->setTable('contenus');
    }
}

/*public funtion photoByIdGalerie();*/
    
