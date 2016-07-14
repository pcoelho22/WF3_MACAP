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
        $reportageListe = $reportageListeManager->contenuReportage();
        //debug($reportageListe);

		$this->show('reportage/liste',
			['reportageListe' => $reportageListe]);
    }
    public function reportageDetails($id) {
        //echo $id;
        
        $reportageDetailsID = new ReportageManager();
        $reportageDetailsId = $reportageDetailsID->findReportageId($id);
        //debug($reportageDetailsId);

        $this->show('reportage/ReportageDetails',['reportageDetails' => $reportageDetailsId]);
    }
}
