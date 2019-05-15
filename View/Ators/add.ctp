<?php
$form = $this->Form->create('Ator');
$form .= $this->Form->input('Ator.nome', 
array(
    'required' => false,
));
$form .= $this->Form->input('Ator.nascimento', 
array(
    'required' => false,
    'type' => 'text',
));
$form .= $this->Js->submit('Gravar', array('div' => false, 'update' => '#content'));
$form .= $this->Form->end('Gravar');

$voltarLink = $this->Js->link('Voltar', '/ators''update' => '#content'));

echo $this->Html->tag('h3', 'novo Ator');
echo $form;
echo $voltarLink;

if ($this->request->is('ajax')) {
    echo $this->writeBuffer();
}