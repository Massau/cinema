<?php
    $detalhe = array();
    foreach ($filmes as $filme) {
        $editLink = $this->Html->link('Alterar', '/filmes/edit/' . $filme['Filme']['id']);
        $viewLink = $this->Html->link($filme['Filme']['nome'], '/filmes/view/' . $filme['Filme']['id']);
        $detalhe[] = array(
            $viewLink,
            $filme['Filme']['ano'],
            $editLink
        );
    }

   
    $titulos = array('Nome', 'Ano', 'Editar');
    $header = $this->Html->tableHeaders($titulos);
    $body = $this->Html->tableCells($detalhe);
    $novoButton = $this->Html->link('Novo', '/filmes/add');

    echo $this->Html->tag('h1','Filmes');
    echo $novoButton;
    echo $this->Html->tag('table', $header . $body);
?>