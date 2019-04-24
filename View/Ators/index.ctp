<?php
//Formata, faz tradução para formato que tableCells entenda
$detalhe = array();
foreach($ators as $ator) {
    $editLink = $this->Html->link('Alterar', '/ators/edit/' . $ator['Ator']['id']);
    $deleteLink = $this->Html->link('Excluir', '/ators/delete/' . $ator['Ator']['id']);
    $viewLink = $this->Html->link($ator['Ator']['nome'], '/ators/view/' . $ator['Ator']['id']);
    $detalhe[] = array(
        $viewLink,
        date('d/m/Y', strtotime($ator['Ator']['nascimento'])),
        $editLink . ' ' . $deleteLink
    );
}


$titulos = array('Nome', 'Nascimento', '');
$header = $this->Html->tableHeaders($titulos);

//HtmlCells tem padrão para receber informação
$body = $this->Html->tableCells($detalhe);
$novoButton = $this->Html->link('Novo', '/ators/add');
$CriticasIndex = $this->Html->link('Críticas', '/criticas');
$FilmesIndex = $this->Html->link('Filmes', '/filmes');
$GenerosIndex = $this->Html->link('Gêneros', '/generos');

echo $this->Html->tag('h3', 'Atores');
echo $novoButton;
echo $this->Html->tag('table', $header . $body);
echo $this->Html->tag('h4', 'Busque também por:');
echo $CriticasIndex . ' ' . $FilmesIndex . ' ' . $GenerosIndex;