<?php
$novoButton = $this->Js->link('Novo', '/criticas/add', array('class' => 'btn btn-success float-right', 'update' => '#content'));
$filtro = $this->Form->create('Critica', array('class' => 'form-inline'));
$filtro .= $this->Form->input('Critica.nome', array(
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

$detalhe = array();
foreach($criticas as $critica) {
    $editLink = $this->Js->link('Alterar', '/criticas/edit/' . $critica['Critica']['id'], array('update' => '#content'));
    $deleteLink = $this->Js->link('Excluir', '/criticas/delete/' . $critica['Critica']['id'], array('update' => '#content'));
    $viewLink = $this->Js->link($critica['Critica']['nome'], '/criticas/view/' . $critica['Critica']['id'], array('update' => '#content'));
    $detalhe[] = array(
        $viewLink,
        $critica['Critica']['avaliacao'],
        $editLink. ' ' . $deleteLink
    );
}

$titulos = array('Nome', 'Avaliação', '');
$header = $this->Html->tag('thead', $this->Html->tableHeaders($titulos), array('class' => 'thead-light'));

$body = $this->Html->tableCells($detalhe);
$AtorsIndex = $this->Html->link('Atores', '/ators');
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

echo $this->Html->tag('h3', 'Criticas');
echo $filtroBar;
echo $this->Html->tag('table', $header . $body, array('class' => 'table table-hover'));
echo $paginateBar;
