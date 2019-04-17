<?php
$detalhe = array();
foreach ($filmes as $filme) {
    $editLink = $this->Html->link('Alterar', '/filmes/edit/' . $filme['Filme']['id']);
    $deleteLink = $this->Html->link('Excluir', '/filmes/delete/' . $filme['Filme']['id']);
    $viewLink = $this->Html->link($filme['Filme']['nome'], '/filmes/view/' . $filme['Filme']['id']);
    $detalhe[] = array(
    $viewLink,
    $filme['Filme']['ano'],
    $filme['Genero']['nome'],
    $editLink . ' ' . $deleteLink
    );
}

   
$titulos = array('Nome', 'Ano', 'Gêneros', '');
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($detalhe);
$novoButton = $this->Html->link('Novo', '/filmes/add');
$AtorsIndex = $this->Html->link('Atores', '/ators');
$CriticasIndex = $this->Html->link('Críticas', '/criticas');
$GenerosIndex = $this->Html->link('Gêneros', '/generos');

echo $this->Html->tag('h1','Filmes');
echo $novoButton;
echo $this->Html->tag('table', $header . $body);echo $this->Html->tag('h4', 'Busque também por:');
echo $AtorsIndex . ' ' . $CriticasIndex . ' ' . $GenerosIndex;