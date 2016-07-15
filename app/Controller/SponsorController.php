<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthorizationManager;
use Manager\SponsorManager;

class SponsorController extends Controller {

    public function add() {
        $this->show('sponsor/add');

    }  
    
    public function addVal() {
        
    }
    
    public function edit() {
        $this->show('sponsor/edit');
    }
    
    public function editVal() {
        
    }
    
    public function delete($id) {
        
    }
    
}