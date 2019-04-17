<?php
class AtorFixture extends CakeTestFixture {
    
    public $name = 'Ator';
    public $import = array('model' => 'Ator', 'records' => false);

    public function init() {
        $this->record = array(
            array('id' => 1, 'nome' => 'Ator', 'nascimento' => '1998-11-01')
        );
        parent::init();
    }
}