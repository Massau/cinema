<?php
App::uses('AppController', 'Controller');

class AtorsController extends AppController {
    
    public function index() {
    
        $ators = $this->Ator->find('all');
        $this->set('ators', $ators);
    }

}