<?php
App::uses('AppController', 'Controller');

class FilmesController extends AppController {
    
    public function index() {
    /*    
        $filmes = array(
            array('Filme'=> array('nome' => 'Avengers', 'ano' => '2019', 'duracao' => '5:00', 'idioma' => 'Inglês')),
            array('Filme'=> array('nome' => 'Rocky', 'ano' => '1979', 'duracao' => '3:00', 'idioma' => 'Inglês')),
            array('Filme'=> array('nome' => 'De Volta para o Futuro', 'ano' => '1986', 'duracao' => '2:00', 'idioma' => 'Inglês')),
            array('Filme'=> array('nome' => 'Esqueceram de Mim', 'ano' => '1994', 'duracao' => '5:00', 'idioma' => 'Inglês')),
        );
    */
        $fields = array('Filme.id', 'Filme.nome', 'Filme.ano', 'Genero.nome');
        $order = array('Filme.ano' => 'desc');
        $group = array();
        $conditions = array(
            'Filme.ano BETWEEN ? AND ?' => array(1980, 2018),
            'Filme.duracao !=' => '1:30'
        );
        $filmes = $this->Filme->find('all', compact('fields', 'conditions', 'order'));
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