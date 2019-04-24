<?php

class CriticaTest extends CakeTestCase {

    public $fixtures = array('app.critica');
    public $Critica = null;

    //SetUp é executado antes de cada caso de teste
    public function setUp() {
        $this->Critica = ClassRegistry::init('Critica');
    }
    public function testExisteModel() {
        $this->assertTrue(is_a($this->Critica, 'Critica'));
    }

    public function testNomeEmpty() {
        $data = array('Critica' => array('nome' => null));
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);
    }

    public function testMinLength() {
        $data = array('Critica' => array('nome' => 'ABC'));
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);
    }

    public function testMaxLength() {
        $data = array('Critica' => array('nome' => 'ABCDE'));
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);
    }

}
