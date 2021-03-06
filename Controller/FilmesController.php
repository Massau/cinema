<?php
App::uses('AppController', 'Controller');

class FilmesController extends AppController {
    
    public $paginate = array(
        'fields' => array('Filme.id', 'Filme.nome', 'Filme.ano', 'Genero.nome'),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Filme.nome' => 'asc')
    );

    public function index() {
    /* NÃO DEU CERTO, JOACIR :(
        if ($this->request->is('post') && !empty($this->request->data['Filme']['nome'])) {
            $this->paginate['conditions'] = array("OR" => array(
                ['Filme.nome LIKE'] = trim($this->request->data['Filme']['nome'] . '%'),
                ['Filme.ano'] = trim($this->request->data['Filme']['ano'])
            ))
        }
    */
        if ($this->request->is('post') && !empty($this->request->data['Filme']['nome'])) {
            $this->paginate['conditions']
            ['Filme.nome'] = trim($this->request->data['Filme']['nome']);
        }
        $filmes = $this->paginate();
        $this->set('filmes', $filmes);
    }

    public function add() {
        if (!empty($this->request->data)) {
            $this->Filme->create();
            if ($this->Filme->save($this->request->data)) {
                $this->Flash->set('Filme gravado com sucesso');
                $this->redirect('/filmes');
            }
        }
        $fields = array('Genero.id', 'Genero.nome');
        $generos = $this->Filme->Genero->find('list', compact('fields'));
        $this->set('generos', $generos);
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Filme->save($this->request->data)) {
                $this->Flash->set('Filme gravado com sucesso');
                $this->redirect('/filmes');
            }
        } else {
            $fields = array('Filme.id', 'Filme.nome', 'Filme.duracao', 'Filme.idioma', 'Filme.ano', 'Filme.genero_id');
            $conditions = array('Filme.id' => $id);
            $this->request->data = $this->Filme->find('first', compact('fields', 'conditions'));
        }
        $fields = array('Genero.id', 'Genero.nome');
        $generos = $this->Filme->Genero->find('list', compact('fields'));
        $this->set('generos', $generos);
    }

    public function view($id = null) {
        $fields = array('Filme.id', 'Filme.nome', 'Filme.duracao', 'Filme.idioma', 'Filme.ano');
        $conditions = array('Filme.id' => $id);
        $this->request->data = $this->Filme->find('first', compact('fields', 'conditions'));
    }

    public function delete($id) {
        $this->Filme->delete($id);
        $this->Flash->set('Filme excluído com sucesso');
        $this->redirect('/filmes');
    }
}