<?php
$novoButton = $this->Js->link('Novo', '/filmes/add', array('class' => 'btn btn-success float-right', 'update' => '#content'));
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
$filtro .= $this->Form->button('Filtrar', array('type' => 'submit', 'class' => 'btn btn-outline-warning mb-2'));
$filtro .= $this->Form->end();

$filtroBar = $this->Html->div('row my-3',
    $this->Html->div('col-md-6', $filtro) .
    $this->Html->div('col-md-6', $novoButton)
);

$detalhe = array();
foreach ($filmes as $filme) {
    $editLink = $this->Js->link('Alterar', '/filmes/edit/' . $filme['Filme']['id'], array('update' => '#content'));
    $deleteLink = $this->Js->link('Excluir', '/filmes/delete/' . $filme['Filme']['id'], array('update' => '#content'));
    $viewLink = $this->Js->link($filme['Filme']['nome'], '/filmes/view/' . $filme['Filme']['id'], array('update' => '#content'));
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
$AtorsIndex = $this->Html->link('Atores', '/ators');
$CriticasIndex = $this->Html->link('Críticas', '/criticas');
$GenerosIndex = $this->Html->link('Gêneros', '/generos');

$this->Paginator->options(array('update' => '#content'));
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

echo $this->Html->tag('h3','Filmes');
echo $filtroBar;
echo $this->Html->tag('table', $header . $body, array('class' => 'table table-hover'));
echo $paginateBar;
if ($this->request->is('ajax')) {
    echo $this->writeBuffer();
}