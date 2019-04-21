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
$form .= $this->Form->end('Gravar');

$voltarLink = $this->Html->link('Voltar', '/ators');

echo $this->Html->tag('h3', 'novo Ator');
echo $form;
echo $voltarLink;