<?php
$view = $this->Html->tag('h2', 'Genero');
$view .= $this->Html->para('', $this->request->data['Genero']['nome']);
$voltarLink = $this->Html->link('Voltar', '/generos');

echo $this->Html->tag('h3', 'Visualizar Genero');
echo $view;
echo $voltarLink;