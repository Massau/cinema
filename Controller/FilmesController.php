<?php
App::uses('AppController', 'Controller');

class FilmesController extends AppController {
    
    public function index() {
        
        $filmes = array(
            array('Filme'=> array('nome' => 'Avengers', 'ano' => '2019', 'duracao' => '5:00', 'idioma' => 'Inglês')),
            array('Filme'=> array('nome' => 'Rocky', 'ano' => '1979', 'duracao' => '3:00', 'idioma' => 'Inglês')),
            array('Filme'=> array('nome' => 'De Volta para o Futuro', 'ano' => '1986', 'duracao' => '2:00', 'idioma' => 'Inglês')),
            array('Filme'=> array('nome' => 'Esqueceram de Mim', 'ano' => '1994', 'duracao' => '5:00', 'idioma' => 'Inglês')),
        );
        $this->set('filmes', $filmes);
    }

}