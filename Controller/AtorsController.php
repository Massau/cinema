<?php
App::uses('AppController', 'Controller');

class AtorsController extends AppController {
    
    public function index() {
    
        $fields = array('Ator.id', 'Ator.nome', 'Ator.nascimento');
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

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Ator->save($this->request->data)) {
                $this->Flash->set('Ator alterado com sucesso');
                $this->redirect('/ators');
            }   
        } else {
            $fields = array('Ator.id', 'Ator.nome', 'Ator.endereco');
            $conditions = array('Ator.id' => $id);            
            $this->request->data = $this->Ator->find('all');
        }
    }

}