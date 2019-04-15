<?php
    echo $this->Html->tag('h1','Filmes');
    $titulos = array('Nome', 'Ano', 'Duração', 'Idioma');
    $header = $this->Html->tableHeaders($titulos);
    $detalhe = array(
        array('Avengers', '2019', '5:00', 'Inglês')
    );
    $body = $this->Html->tableCells($detalhe);

    echo $this->Html->tag('table', $header . $body);
?>