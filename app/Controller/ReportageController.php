<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\ReportageManager;


class ReportageController extends Controller {

    /**
     * Page avec les reportages
     */
    public function liste() {
    	$reportageListeManager = new ReportageManager();
        $reportageListe = $reportageListeManager->findAll();
        //debug($reportageListe);

		$this->show('reportage/liste',
			['reportageListe' => $reportageListe]);
    }
}
