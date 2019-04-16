<?php
App::uses('AppModel', 'Model');

class Ator extends AppModel {

    public $validate = array(
        'nome' => array(
            'rule' => 
                'notBlank', 'message' => 'Informe o nome',
                'minLength' => 3
            ),
        'nascimento' => array(
            'rule' => 
            'notBlank', 'message' => 'Informe a data de nascimento'),
    );

}