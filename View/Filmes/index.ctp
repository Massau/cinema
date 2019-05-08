<?php
$filtro = $this->Form->create('Filme', array('class' => 'form-row'));
$filtro .= $this->Form->input('Filme.nome', array(
    'required' => false,
    'label' => array('text' => 'Nome', 'class' => 'sr-only'),
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => true,
    'placeholder' => 'Nome'
));
$filtro .= $this->Form->input('Filme.ano', array(
    'required' => false,
    'label' => array('text' => 'Nome', 'class' => 'sr-only mx-5'),
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => true,
    'placeholder' => 'Ano'
));
$filtro .= $this->Form->end('Filtrar');

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
$header = $this->Html->tag('thead', $this->Html->tableHeaders($titulos), array('class' => 'thead-light'));
$body = $this->Html->tableCells($detalhe);
$novoButton = $this->Html->link('Novo', '/filmes/add');
$AtorsIndex = $this->Html->link('Atores', '/ators');
$CriticasIndex = $this->Html->link('Críticas', '/criticas');
$GenerosIndex = $this->Html->link('Gêneros', '/generos');

$paginate = '';
$paginate .= $this->Paginator->first() . '  ';
$paginate .= $this->Paginator->prev() . '  ';
$paginate .= $this->Paginator->next() . '  ';
$paginate .= $this->Paginator->last() . '  ';
$paginate .= $this->Paginator->link('5 por página', array('controller' => 'criticas', 'action' => 'index', 'limit' => 5)) . '  ';
$paginate .= $this->Paginator->link('10 por página', array('controller' => 'criticas', 'action' => 'index', 'limit' => 10)) . '  ';
$paginate = $this->Html->para('', $paginate);

echo $this->Html->tag('h3','Filmes');
echo $novoButton;
echo $filtro;
echo $this->Html->tag('table', $header . $body, array('class' => 'table table-hover'));
echo $paginate . '<br>';