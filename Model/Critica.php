<?php
App::uses('AppModel', 'Model');

class Critica extends AppModel {

    public $belongsTo = array(
        'Filme'
    );

    public $validate = array(
        'nome' => array(
            'notBlank' => array(
                'rule' => 'notBlank', 'message' => 'Informe a crítica'
            ),

            'minLength' => array(
                'rule' => array('minLength', 3), 'message' => 'Informe ao menos 3 caracteres'
            ),

            'maxLength' => array(
                'rule' => array('maxLength', 5), 'message' => 'Informe no máximo 5 caractere'
            )
        ),
        
    );

}