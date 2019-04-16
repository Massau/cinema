<?php
App::uses('AppController', 'Controller');

class AtorsController extends AppController {
    
    public function index() {
    
        //Como vem informação do modelo - Matriz tripla
        $ators = array(
            //    Model       'propriedade'
            array('Ator' => array('nome' => 'Robert', 'nascimento' => '1980-03-02')),
            array('Ator' => array('nome' => 'Claudia', 'nascimento' => '1945-04-04')),
        );
        //    Faz informação ficar visivel na view
        $this->set('ators', $ators);
    }

}