<?php

namespace Manager;

class GalerieManager extends \W\Manager\Manager{

    function __construct(){
        parent::__construct();
        //je definis manuelement le nom de la table
        $this->setTable('galeries');
    }

    public function getFirstImage($id){
        $sql = "SELECT photos.pho_path
                FROM photos
                JOIN galeries_has_photos ON galeries_has_photos.photos_id = photos.id
                JOIN galeries ON galeries.id =  galeries_has_photos.galeries_id
                WHERE galeries.id = :id
                LIMIT 1";

        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":id", $id);
        $sth->fetch();
    }
}

    
