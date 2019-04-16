<?php
$form = $this->Form->create('Ator');
$form .= $this->Form->hidden('Ator.id');
$form .= $this->Form->input('Ator.nome', array('required' => true));
$form .= $this->Form->input('Ator.nascimento', array('type' => 'date'));
$form .= $this->Form->end('Gravar');

$voltarLink = $this->Html->link('Voltar', '/ators');

echo $this->Html->tag('h1', 'Alterar Ator');
echo $form;
echo $voltarLink;