<?php
class FilmeFixture extends CakeTestFixture {
    
    public $name = 'Filme';
    public $import = array('model' => 'Filme', 'records' => false);

    public function init() {
        $this->record = array(
            array('nome' => 'Avengers', 'ano' => '2019', 'duracao' => '5:00', 'idioma' => 'Inglês')
        );
        parent::init();
    }
}