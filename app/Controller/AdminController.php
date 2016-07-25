<?php

namespace Controller;

use Manager\ExposantManager;
use Manager\ParticipantManager;
use Manager\SponsorManager;
use \W\Controller\Controller;
use \Manager\UserManager;

class AdminController extends Controller {

    public function adminHome() {
        $this->allowTo('2');
        $this->show('admin/adminHome');
    }

    public function adminListeUsers() {
        $this->allowTo('2');

        $userManager = new UserManager();
        $listeUsers = $userManager->findAll();

        $this->show('admin/listeUsers',['listeUsers'=>$listeUsers]);
    }

    public function adminListeExposants() {
        $this->allowTo('2');

        $exposantManager = new ExposantManager();
        $listeExposants = $exposantManager->findAll();

        $this->show('admin/listeExposants', ['listeExposants'=>$listeExposants]);
    }

    public function adminListeParticipant() {
        $this->allowTo('2');

        $participantManager = new ParticipantManager();
        $listeParticipants = $participantManager->findAll();

        $this->show('admin/listeParticipants', ['listeParticipants'=>$listeParticipants]);
    }

    public function adminListeSponsors() {
        $this->allowTo('2');

        $sponsorManager = new SponsorManager();
        $listeSponsors = $sponsorManager->findAll();

        $this->show('admin/listeSponsors', ['listeSponsors'=>$listeSponsors]);
    }

}
