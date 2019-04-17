<?php
$detalhe = array();
foreach($generos as $genero) {
    $editLink = $this->Html->link('Alterar', '/generos/edit/' . $genero['Genero']['id']);
    $viewLink = $this->Html->link($genero['Genero']['nome'], '/generos/view/' . $genero['Genero']['id']);
    $detalhe[] = array(
        $viewLink,
        $editLink
    );
}

$titulos = array('Nome', '');
$header = $this->Html->tableHeaders($titulos);

$body = $this->Html->tableCells($detalhe);
$novoButton = $this->Html->link('Novo', '/generos/add');

echo $this->Html->tag('h1', 'Generos');
echo $novoButton;
echo $this->Html->tag('table', $header . $body);