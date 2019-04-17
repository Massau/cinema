<?php
App::uses('AppController', 'Controller');

class CriticasController extends AppController {
    
    public function index() {
    
        $fields = array('Critica.id', 'Critica.nome', 'Critica.nascimento');
        $criticas = $this->Critica->find('all');
        $this->set('criticas', $criticas);

    }

    public function add() {
        if(!empty($this->request->data)) {
            $this->Critica->create();
            if ($this->Critica->save($this->request->data)) {
                $this->Flash->set('Critica gravado com sucesso');
                $this->redirect('/criticas');
            }
        }
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Critica->save($this->request->data)) {
                $this->Flash->set('Critica alterada com sucesso');
                $this->redirect('/criticas');
            }   
        } else {
            $fields = array('Critica.id', 'Critica.nome', 'Critica.nascimento');
            $conditions = array('Critica.id' => $id);            
            $this->request->data = $this->Critica->find('all');
        }
    }

    public function view($id = null) {
        $fields = array('Critica.id', 'Critica.nome', 'Critica.nascimento');
        $conditions = array('Critica.id' => $id);            
        $this->request->data = $this->Critica->find('first', compact('fields', 'conditions'));
    }
}