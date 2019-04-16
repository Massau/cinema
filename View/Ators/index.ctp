<?php
//Formata, faz tradução para formato que tableCells entenda
$detalhe = array();
foreach($ators as $ator) {
    $detalhe[] = array(
        $ator['Ator']['nome'], 
        $ator['Ator']['nascimento']
    );
}

echo $this->Html->tag('h1', 'Atores');
    
$titulos = array('Nome', 'Nascimento');
$header = $this->Html->tableHeaders($titulos);
    
//HtmlCells tem padrão para receber informação
$body = $this->Html->tableCells($detalhe);

echo $this->Html->tag('table', $header . $body);