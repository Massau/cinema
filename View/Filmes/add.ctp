<?php
$form = $this->Form->create('Filme');
$form .= $this->Form->input('Filme.nome');
$form .= $this->Form->input('Filme.idioma');
$form .= $this->Form->input('Filme.duracao');
$form .= $this->Form->input('Filme.ano');
//$form .= $this->Form->submit('Gravar');
$form .= $this->Form->end('Gravar');

echo $this->Html->tag('h1', 'Novo Filme');
echo $form;