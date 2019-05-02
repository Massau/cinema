<?php
App::uses('AppController', 'Controller');

class GenerosController extends AppController {
    
    public $paginate = array(
        'fields' => array('Genero.id', 'Genero.nome'),
        'conditions' => array(),
        'limit' => 6,
        'order' => array('Genero.nome' => 'desc')
    );

    public function index() {
        /*
        $fields = array('Genero.id', 'Genero.nome');
        $generos = $this->Genero->find('all');
        */
        $generos = $this->paginate();
        $this->set('generos', $generos);
    }

    public function add() {
        if(!empty($this->request->data)) {
            $this->Genero->create();
            if ($this->Genero->save($this->request->data)) {
                $this->Flash->set('Genero gravado com sucesso');
                $this->redirect('/generos');
            }
        }
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Genero->save($this->request->data)) {
                $this->Flash->set('Genero alterado com sucesso');
                $this->redirect('/generos');
            }   
        } else {
            $fields = array('Genero.id', 'Genero.nome');
            $conditions = array('Genero.id' => $id);            
            $this->request->data = $this->Genero->find('all');
        }
    }

    public function view($id = null) {
        $fields = array('Genero.id', 'Genero.nome');
        $conditions = array('Genero.id' => $id);            
        $this->request->data = $this->Genero->find('first', compact('fields', 'conditions'));
    }

    public function delete($id) {
        $this->Genero->delete($id);
        $this->Flash->set('Genero excluído com sucesso');
        $this->redirect('/generos');
    }
}