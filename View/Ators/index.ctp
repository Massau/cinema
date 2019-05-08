<?php
$novoButton = $this->Html->link('Novo', '/ators/add', array('class' => 'btn btn-success float-right'));

$filtro = $this->Form->create('Ator', array('class' => 'form-inline'));
$filtro .= $this->Form->input('Ator.nome', array(
    'required' => false,
    'label' => array('text' => 'Nome', 'class' => 'sr-only'),
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome'
));
$filtro .= $this->Form->button('Filtrar', array('type' => 'submit', 'class' => 'btn btn-outline-warning mb-2'));
$filtro .= $this->Form->end();

$filtroBar = $this->Html->div('row my-3',
    $this->Html->div('col-md-6', $filtro) .
    $this->Html->div('col-md-6', $novoButton)
);

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
$header = $this->Html->tag('thead', $this->Html->tableHeaders($titulos), array('class' => 'thead-light'));

//HtmlCells tem padrão para receber informação
$body = $this->Html->tableCells($detalhe);
$CriticasIndex = $this->Html->link('Críticas', '/criticas');
$FilmesIndex = $this->Html->link('Filmes', '/filmes');
$GenerosIndex = $this->Html->link('Gêneros', '/generos');

$links = array(
    $this->Paginator->first('Primeira', array('class' => 'page-link')),
    $this->Paginator->prev('Anterior', array('class' => 'page-link')),
    $this->Paginator->next('Próxima', array('class' => 'page-link')),
    $this->Paginator->last('Última', array('class' => 'page-link')),
);
$paginate = $this->Html->nestedList($links, array('class' => 'pagination'), array('class' => 'page-item'));
$paginate = $this->Html->tag('nav', $paginate);
$paginateCount = $this->Paginator->counter(
    'Página {:page} de {:pages}. Mostrando {:current} registros de {:count}. Começo {:start}, até {:end}'
);
$paginateBar = $this->Html->div('row',
    $this->Html->div('col-md-6', $paginate) .
    $this->Html->div('col-md-6', $paginateCount)
);
/*
$paginate .= $this->Paginator->first() . '  ';
$paginate .= $this->Paginator->prev() . '  ';
$paginate .= $this->Paginator->next() . '  ';
$paginate .= $this->Paginator->last() . '  ';
$paginate .= $this->Paginator->link('5 por página', array('controller' => 'ators', 'action' => 'index', 'limit' => 5)) . '  ';
$paginate .= $this->Paginator->link('10 por página', array('controller' => 'ators', 'action' => 'index', 'limit' => 10)) . '  ';
$paginate = $this->Html->para('', $paginate);
*/
echo $this->Html->tag('h3', 'Atores');
echo $filtroBar;
echo $this->Html->tag('table', $header . $body, array('class' => 'table table-hover'));
echo $paginateBar;