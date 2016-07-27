<?php

namespace Manager;

class PhotoManager extends \W\Manager\Manager{

    function __construct(){
        parent::__construct();
        //je definis manuelement le nom de la table
        $this->setTable('photos');
    }

    public function getPhotoSlider(){
        $sql = "SELECT * 
                FROM photos
                JOIN galeries_has_photos ON galeries_has_photos.photos_id = photos.id
                JOIN galeries ON galeries.id = galeries_has_photos.galeries_id
                WHERE galeries.gal_name = 'Slider'";

        $sth = $this->dbh->prepare($sql);
        $sth->execute();

        return $sth->fetchAll();
    }
    public function getFirstPhoto(){
        $sql = "SELECT pho_path 
                FROM photos
                JOIN galeries_has_photos ON galeries_has_photos.photos_id = photos.id
                JOIN galeries ON galeries.id = galeries_has_photos.galeries_id
                LIMIT 1
                ";

        $sth = $this->dbh->prepare($sql);
        $sth->execute();

        return $sth->fetchAll();
    }

}