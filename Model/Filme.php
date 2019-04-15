<?php
App::uses('AppModel', 'Model');

class Filme extends AppModel {
    
    public $validate = array(
        'nome' => array('rule' => 'notEmpty', 'message' => 'Informe o nome')
    );

}