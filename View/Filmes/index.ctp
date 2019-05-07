<?php
$filtro = $this->Form->create('Filme');
$filtro .= $this->Form->input('Filme.nome', array('required' => false));
$filtro .= $this->Form->input('Filme.ano');
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
$header = $this->Html->tableHeaders($titulos);
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
echo $this->Html->tag('table', $header . $body, array('class' => 'table'));
echo $paginate . '<br>';

echo $this->Html->tag('h4', 'Busque também por:');
echo $AtorsIndex . ' ' . $CriticasIndex . ' ' . $GenerosIndex;