<?php
$detalhe = array();
foreach($criticas as $critica) {
    $editLink = $this->Html->link('Alterar', '/criticas/edit/' . $critica['Critica']['id']);
    $viewLink = $this->Html->link($critica['Critica']['nome'], '/criticas/view/' . $critica['Critica']['id']);
    $detalhe[] = array(
        $viewLink,
        $critica['Critica']['nome'],
        $critica['Critica']['avaliacao'],
        $editLink
    );
}

$titulos = array('Filme', 'Nome', 'Avaliação', 'Data',  '');
$header = $this->Html->tableHeaders($titulos);

$body = $this->Html->tableCells($detalhe);
$novoButton = $this->Html->link('Novo', '/criticas/add');
$AtorsIndex = $this->Html->link('Atores', '/ators');
$FilmesIndex = $this->Html->link('Filmes', '/filmes');
$GenerosIndex = $this->Html->link('Gêneros', '/generos');

echo $this->Html->tag('h3', 'Criticas');
echo $novoButton;
echo $this->Html->tag('table', $header . $body);
echo $this->Html->tag('h4', 'Busque também por:');
echo $AtorsIndex . ' ' . $FilmesIndex . ' ' . $GenerosIndex;