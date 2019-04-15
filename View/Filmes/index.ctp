<?php
    $detalhe = array();
    foreach ($filmes as $filme) {
        $detalhe[] = array(
            $filme['Filme']['nome'], 
            $filme['Filme']['ano']
        );
    }

    echo $this->Html->tag('h1','Filmes');
    $titulos = array('Nome', 'Ano');
    $header = $this->Html->tableHeaders($titulos);
    $body = $this->Html->tableCells($detalhe);

    echo $this->Html->tag('table', $header . $body);
?>