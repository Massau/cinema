<?php
$form = $this->Form->create('Genero');
$form .= $this->Form->hidden('Genero.id');
$form .= $this->Form->input('Genero.nome', array('required' => true));
$form .= $this->Form->end('Gravar');

$voltarLink = $this->Html->link('Voltar', '/generos');

echo $this->Html->tag('h3', 'Alterar Genero');
echo $form;
echo $voltarLink;