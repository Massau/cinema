<?php
$filtro = $this->Form->create('Critica', array('class' => 'form-inline'));
$filtro .= $this->Form->input('Critica.nome', array(
    'required' => false,
    'label' => array('text' => 'Nome', 'class' => 'sr-only'),
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome'
));
$filtro .= $this->Form->end('Filtrar');

$detalhe = array();
foreach($criticas as $critica) {
    $editLink = $this->Html->link('Alterar', '/criticas/edit/' . $critica['Critica']['id']);
    $deleteLink = $this->Html->link('Excluir', '/criticas/delete/' . $critica['Critica']['id']);
    $viewLink = $this->Html->link($critica['Critica']['nome'], '/criticas/view/' . $critica['Critica']['id']);
    $detalhe[] = array(
        $viewLink,
        $critica['Critica']['avaliacao'],
        $editLink. ' ' . $deleteLink
    );
}

$titulos = array('Nome', 'Avaliação', '');
$header = $this->Html->tag('thead', $this->Html->tableHeaders($titulos), array('class' => 'thead-light'));

$body = $this->Html->tableCells($detalhe);
$novoButton = $this->Html->link('Novo', '/criticas/add');
$AtorsIndex = $this->Html->link('Atores', '/ators');
$FilmesIndex = $this->Html->link('Filmes', '/filmes');
$GenerosIndex = $this->Html->link('Gêneros', '/generos');

$paginate = '';
$paginate .= $this->Paginator->first() . '  ';
$paginate .= $this->Paginator->prev() . '  ';
$paginate .= $this->Paginator->next() . '  ';
$paginate .= $this->Paginator->last() . '  ';
$paginate .= $this->Paginator->link('5 por página', array('controller' => 'criticas', 'action' => 'index', 'limit' => 5)) . '  ';
$paginate .= $this->Paginator->link('10 por página', array('controller' => 'criticas', 'action' => 'index', 'limit' => 10)) . '  ';
$paginate = $this->Html->para('', $paginate);

echo $this->Html->tag('h3', 'Criticas');
echo $novoButton;
echo $filtro;
echo $this->Html->tag('table', $header . $body, array('class' => 'table table-hover'));
echo $paginate;
