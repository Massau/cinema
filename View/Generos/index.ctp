<?php
$filtro = $this->Form->create('Genero');
$filtro .= $this->Form->input('Genero.nome', array('required' => false));
$filtro .= $this->Form->End('Filtrar');

$detalhe = array();
foreach($generos as $genero) {
    $editLink = $this->Html->link('Alterar', '/generos/edit/' . $genero['Genero']['id']);
    $deleteLink = $this->Html->link('Excluir', '/generos/delete/' . $genero['Genero']['id']);
    $viewLink = $this->Html->link($genero['Genero']['nome'], '/generos/view/' . $genero['Genero']['id']);
    $detalhe[] = array(
        $viewLink,
        $editLink . ' ' . $deleteLink
    );
}

$titulos = array('Nome', '');
$header = $this->Html->tag('thead', $this->Html->tableHeaders($titulos));

$body = $this->Html->tableCells($detalhe);
$novoButton = $this->Html->link('Novo', '/generos/add');
$AtorsIndex = $this->Html->link('Atores', '/ators');
$CriticasIndex = $this->Html->link('Críticas', '/criticas');
$FilmesIndex = $this->Html->link('Filmes', '/filmes');

$paginate = '';
$paginate .= $this->Paginator->first()  . '  ';
$paginate .= $this->Paginator->prev()  . '  ';
$paginate .= $this->Paginator->next()  . '  ';
$paginate .= $this->Paginator->last()  . '  ';
$paginate .= $this->Paginator->link('5 por página', array('controller' => 'criticas', 'action' => 'index', 'limit' => 5)) . '  ';
$paginate .= $this->Paginator->link('10 por página', array('controller' => 'criticas', 'action' => 'index', 'limit' => 10)) . '  ';
$paginate = $this->Paginator->Html->para('', $paginate);

echo $this->Html->tag('h3', 'Generos');
echo $novoButton;
echo $filtro;
echo $this->Html->tag('table', $header . $body, array('class' => 'table table-hover'));
echo $paginate . '<br>';