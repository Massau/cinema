<?php

class AtorTest extends CakeTestCase {

    public $fixtures = array('app.ator');
    public $Ator = null;

    //SetUp é executado antes de cada caso de teste
    public function setUp() {
        $this->Ator = ClassRegistry::init('Ator');
    }

    public function testExisteModel() {
        $this->assertTrue((is_a($this->Ator, 'Ator')));
    }

    public function testNomeEmpty() {
        $data = array('Ator' => array('nome' => null));
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);
    }

    public function testMinLength() {
        $data = array('Ator' => array('nome' => 'AB'));
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);
    }
    
    public function testNascimentoNotBlank() {
        $data = array('Ator' => array('nascimento' => ' '));
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);
    }

}