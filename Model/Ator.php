<?php
App::uses('AppModel', 'Model');

class Ator extends AppModel {

    public $validate = array(
        'nome' => array(
            'notBlank' => array(
                'rule' => 'notBlank', 'message' => 'Informe o nome'
            ),
            'minLength' => array(
                'rule' => array('minLength', 3), 'message' => 'Informe ao menos 3 caracteres'
            )
        ),
        'nascimento' => array(
            'notBlank' => array(
                'rule' => 'notBlank', 'message' => 'Informe a data de nascimento'
            ),
        )
    );

}