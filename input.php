<?php
session_start();

    include_once('conexao.php');


    $nome = filter_input(INPUT_POST, 'nome');
    $raca = filter_input(INPUT_POST, 'raca');
    $especie = filter_input(INPUT_POST, 'especie');
    $peso = filter_input(INPUT_POST, 'peso');
    $coloracao = filter_input(INPUT_POST, 'coloracao');
    $idade = filter_input(INPUT_POST, 'idade');
    $procedencia = filter_input(INPUT_POST, 'procedencia');


$result_ficha = "INSERT INTO registros_fichatec (nome, raca, especie, peso, coloracao, idade, procedencia, created) VALUES ('$nome', '$raca', '$especie', '$peso', '$coloracao', '$idade', '$procedencia', NOW())";
$resultado_ficha = mysqli_query($conn ,$result_ficha);

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style='color: green;'>Ficha técnica cadastrada com sucesso!</p>";
    header('Location: registros.php');
    exit;
}else{  
    $_SESSION['msg'] = "<p style='color: red;'Ficha técnica não foi cadastrada com sucesso!</p>";
    header('Location: fichaTec.php');
    exit;
}