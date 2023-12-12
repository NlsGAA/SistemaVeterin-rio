<?php

    $nome = filter_input(INPUT_POST, 'nome');
    $raca = filter_input(INPUT_POST, 'raca');
    $especie = filter_input(INPUT_POST, 'especie');
    $peso = filter_input(INPUT_POST, 'peso');
    $coloracao = filter_input(INPUT_POST, 'coloracao');
    $idade = filter_input(INPUT_POST, 'idade');
    $procedencia = filter_input(INPUT_POST, 'procedencia');


if($nome && $raca && $especie && $peso && $coloracao && $idade && $procedencia){

    setcookie('nomeFichaTecnica', $nome, time() + (86400 * 30000));
    setcookie('racaFichaTecnica', $raca, time() + (86400 * 30000));
    setcookie('especieFichaTecnica', $especie, time() + (86400 * 30000));
    setcookie('pesoFichaTecnica', $peso, time() + (86400 * 300000));
    setcookie('coloracaoFichaTecnica', $coloracao, time() + (86400 * 30000));
    setcookie('idadeFichaTecnica', $idade, time() + (86400 * 300000));
    setcookie('procedenciaFichaTecnica', $procedencia, time() + (86400 * 30000));

    header('Location: registros.php');
};