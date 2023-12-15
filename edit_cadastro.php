<?php
session_start();

    include_once('conexao.php');

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $nome = filter_input(INPUT_POST, 'nome');
    $raca = filter_input(INPUT_POST, 'raca');
    $especie = filter_input(INPUT_POST, 'especie');
    $peso = filter_input(INPUT_POST, 'peso');
    $coloracao = filter_input(INPUT_POST, 'coloracao');
    $idade = filter_input(INPUT_POST, 'idade');
    $procedencia = filter_input(INPUT_POST, 'procedencia');


$result_ficha = "UPDATE registros_fichatec SET nome='$nome', raca='$raca', especie='$especie', peso='$peso', coloracao='$coloracao', idade='$idade', procedencia='$procedencia', modified=NOW() WHERE id='$id'";
$resultado_ficha = mysqli_query($conn ,$result_ficha);

if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style='color: green;'>Ficha técnica editada com sucesso!</p>";
    header('Location: registros.php');
    exit;
}else{  
    $_SESSION['msg'] = "<p style='color: red;'Ficha técnica não foi editada com sucesso!</p>";
    header("Location: editar.php?id=$id");
    exit;
}