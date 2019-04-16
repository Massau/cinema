<?php
App::uses('AppController', 'Controller');

class AtorsController extends AppController {
    
    public function index() {
    
        $ators = $this->Ator->find('all');
        $this->set('ators', $ators);

    }

    public function add() {
        if(!empty($this->request->data)) {
            $this->Ator->create();
            if ($this->Ator->save($this->request->data)) {
                $this->Flash->set('Ator gravado com sucesso');
                $this->redirect('/ators');
            }
        }
    }

}