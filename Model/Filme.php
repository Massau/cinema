<?php
App::uses('AppModel', 'Model');

class Filme extends AppModel {
    
    public $validate = array(
        'nome' => array('rule' => 'notBlank', 'message' => 'Informe o nome'),
        'duracao' => array('rule' => 'notBlank', 'message' => 'Informe a duração'),
    );

}