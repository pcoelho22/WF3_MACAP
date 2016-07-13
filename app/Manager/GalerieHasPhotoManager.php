<?php

namespace Manager;

class GalerieHasPhotoManager extends \W\Manager\Manager{

    function __construct(){
        parent::__construct();
        //je definis manuelement le nom de la table
        $this->setTable('galeries_has_photos');
    }

    public function findPhotoId($id)
    {
        if (!is_numeric($id)){
            return false;
        }

        $sql = "
        SELECT * 
        FROM " . $this->table . " 
        INNER JOIN photos ON photos.id = galeries_has_photos.photos_id
        WHERE galeries_id = :id"
        ;
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":id", $id);
        $sth->execute();

        return $sth->fetchAll();
	}
}

