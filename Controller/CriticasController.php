<?php
App::uses('AppController', 'Controller');

class CriticasController extends AppController {
    
    public $paginate = array(
        'fields' => array('Critica.id', 'Filme.nome', 'Critica.nome', 'Critica.avaliacao'),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Critica.nome' => 'desc')
    );

    public function index() {
    
        /*
        $fields = array('Critica.id', 'Critica.nome', 'Critica.nascimento');
        $criticas = $this->Critica->find('all');
        */
        if ($this->request->is('post') && !empty($this->request->data['Critica']['nome'])) {
            $this->paginate['conditions']['Critica.nome'] = trim($this->request->data['Critica']['nome']);
        }
        $criticas = $this->paginate();
        $this->set('criticas', $criticas);
    }
    
    public function add() {
        if(!empty($this->request->data)) {
            $this->Critica->create();
            if ($this->Critica->save($this->request->data)) {
                $this->Flash->set('Critica gravada com sucesso');
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

    public function delete($id) {
        $this->Critica->delete($id);
        $this->Flash->set('Critica excluída com sucesso');
        $this->redirect('/criticas');
    }
}