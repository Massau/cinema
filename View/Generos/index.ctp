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
$AtorsIndex = $this->Html->link('Atores', '/ators');
$CriticasIndex = $this->Html->link('Críticas', '/criticas');
$FilmesIndex = $this->Html->link('Filmes', '/filmes');

echo $this->Html->tag('h1', 'Generos');
echo $novoButton;
echo $this->Html->tag('table', $header . $body);
echo $this->Html->tag('h4', 'Busque também por:');
echo $AtorsIndex . ' ' . $CriticasIndex . ' ' . $FilmesIndex;