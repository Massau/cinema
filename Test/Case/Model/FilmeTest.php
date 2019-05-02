<?php

class FilmeTest extends CakeTestCase {

    public $fixture = array('app.filme');

    public function testExisteModel() {
        $filme = ClassRegistry::init('Filme');
        $this->assertTrue((is_a($filme, 'Filme')));
    }

    public function testNomeEmpty() {
        $filme = ClassRegistry::init('Filme');
        $data = array('Filme' => array('nome' =>null));
        $saved = $filme->save($data);
        $this->assertFalse($saved);
    }

    public function testDuracaoEmpty() {
        $data = array('Filme' => array('duracao' => null));
        $saved = $this->Filme->save($data);
        $this->assertFalse($saved);
    }
    
}