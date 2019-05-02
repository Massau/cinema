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

$paginate = '';
$paginate .= $this->Paginator->first() . '  ';
$paginate .= $this->Paginator->prev() . '  ';
$paginate .= $this->Paginator->next() . '  ';
$paginate .= $this->Paginator->last() . '  ';
$paginate .= $this->Paginator->link('5 por página', array('controller' => 'ators', 'action' => 'index', 'limit' => 5)) . '  ';
$paginate .= $this->Paginator->link('10 por página', array('controller' => 'ators', 'action' => 'index', 'limit' => 10)) . '  ';
$paginate = $this->Html->para('', $paginate);

echo $this->Html->tag('h3', 'Atores');
echo $novoButton;
echo $this->Html->tag('table', $header . $body);
echo $paginate . '<br>';

echo $this->Html->tag('h4', 'Busque também por:');
echo $CriticasIndex . ' ' . $FilmesIndex . ' ' . $GenerosIndex;