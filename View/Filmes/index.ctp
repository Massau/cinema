<?php
    $detalhe = array();
    foreach ($filmes as $filme) {
        $detalhe[] = array(
            $filme['Filme']['nome'], 
            $filme['Filme']['ano']
        );
    }

   
    $titulos = array('Nome', 'Ano');
    $header = $this->Html->tableHeaders($titulos);
    $body = $this->Html->tableCells($detalhe);
    $novoButton = $this->Html->link('Novo', '/filmes/add');

    echo $this->Html->tag('h1','Filmes');
    echo $novoButton;
    echo $this->Html->tag('table', $header . $body);
?>