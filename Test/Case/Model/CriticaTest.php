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
}
