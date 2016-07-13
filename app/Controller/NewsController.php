<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\NewsManager;



class NewsController extends Controller {

    /**
     * Page avec news
     */
    public function liste() {
    	$newsListeManager = new NewsManager();
        $newsListe = $newsListeManager->findAll();
        //debug($newsListe);

		$this->show('news/liste',
			['newsListe' => $newsListe]);
    }
    /**
     * Page de newsDetails de chaque news
     */
    public function newsDetails($id) {
    	//echo $id;
		
		$newsDetailsID = new NewsDetailsHasNewsDetailsManager();
		$newsDetailsId = $newsDetailsID->findnewsDetailsId($id);
        //debug($NewsDetailsId);

        $this->show('news/newsDetails',['NewsDetails' => $photosGalerieId]);
    }
}
