<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthorizationManager;
use Manager\ParticipantManager;

class ParticipantController extends Controller {

    public function add() {
        $this->show('participant/add');
    }  
    
    public function addVal() {
        
    }
    
    public function edit() {
        $this->show('participant/add');
    }
    
    public function editVal() {
        
    }
    
    public function delete($id) {
        
    }   
    
}
