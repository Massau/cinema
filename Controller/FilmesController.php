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
        $fields = array('Filme.id', 'Filme.nome', 'Filme.ano');
        $order = array('Filme.ano' => 'desc');
        $group = array();
        $conditions = array(
            'Filme.ano BETWEEN ? AND ?' => array(1980, 2000),
            'Filme.duracao !=' => '3:00'
        );
        $filmes = $this->Filme->find('all', compact('conditions', 'order'));
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
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Filme->save($this->request->data)) {
                $this->Flash->set('Filme gravado com sucesso');
                $this->redirect('/filmes');
            }
        } else {
            $fields = array('Filme.id', 'Filme.nome', 'Filme.duracao', 'Filme.idioma', 'Filme.ano');
            $conditions = array('Filme.id' => $id);
            $this->request->data = $this->Filme->find('first', compact('fields', 'conditions'));
        }
    }

}