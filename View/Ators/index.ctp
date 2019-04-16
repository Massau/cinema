<?php
    echo $this->Html->tag('h1', 'Atores');
    
    $titulos = array('Nome', 'Nascimento');
    $header = $this->Html->tableHeaders($titulos);
    
    $detalhe = array(
        array('Robert', '1980-03-02')
    );
    $body = $this->Html->tableCells($detalhe);

    echo $this->Html->tag('table', $header . $body);