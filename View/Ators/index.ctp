<?php
//Formata, faz tradução para formato que tableCells entenda
$detalhe = array();
foreach($ators as $ator) {
    $editLink = $this->Html->link('Alterar', '/ators/edit/' . $ator['Ator']['id']);
    $detalhe[] = array(
        $ator['Ator']['nome'], 
        date('d/m/Y', strtotime($ator['Ator']['nascimento'])),
        $editLink
    );
}


$titulos = array('Nome', 'Nascimento', '');
$header = $this->Html->tableHeaders($titulos);

//HtmlCells tem padrão para receber informação
$body = $this->Html->tableCells($detalhe);
$novoButton = $this->Html->link('Novo', '/ators/add');

echo $this->Html->tag('h1', 'Atores');
echo $novoButton;
echo $this->Html->tag('table', $header . $body);