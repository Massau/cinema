<?php
App::uses('AppModel', 'Model');

class Ator extends AppModel {

    public $hasAndBelongsToMany = array(
        'Filme'
    );
    
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
            'date' => array(
                /* */
                'rule' => array('date', 'dmy'), 'message' => 'Data inválida'
            ),
        )
    );

    public function beforeSave($options = array()) {
        if (!empty($this->data['Ator']['nascimento'])) {
            /*STR_REPLACE: substitui onde tem barra por traço*/
            $nascimento = str_replace('/', '-', $this->data['Ator']['nascimento']);
            $this->data['Ator']['nascimento'] = date('Y-m-d', strtotime($nascimento));
        }
        
        return true;
    }

}