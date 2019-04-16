<?php
$view = $this->Html->tag('h2', 'Nome');
$view .= $this->Html->para('', $this->request->data['Ator']['nome']);
$view = $this->Html->tag('h2', 'Nascimento');
$view .= $this->Html->para('', $this->request->data['Ator']['nascimento']);
$voltarLink = $this->Html->link('Voltar', '/ators');

echo $this->Html->tag('h1', 'Visualizar Ator');
echo $view;
echo $voltarLink;