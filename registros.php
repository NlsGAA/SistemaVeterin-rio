<?php

include('input.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="registros.css">
</head>
<body>
    
    <div class="box-register">

            <label>Nome:
                <?php 
                if($_COOKIE['nomeFichaTecnica']){
                    echo '<span>'. $_COOKIE['nomeFichaTecnica'].'</span>'; 
                }else{
                    echo '';
                }
                ?> <a href="limpar.php">Excluir</a>
            </label>
            <fieldset>
            <label>Raça:</br>
            <?php 
                if($_COOKIE['racaFichaTecnica']){
                    echo '<span>'. $_COOKIE['racaFichaTecnica'].'</span>'; 
                }else{
                    echo '';
                }
                ?>
            </label>
            </fieldset>
            <fieldset>
            <label>Espécie:</br>
            <?php 
                if($_COOKIE['especieFichaTecnica']){
                    echo '<span>'. $_COOKIE['especieFichaTecnica'].'</span>'; 
                }else{
                    echo '';
                }
                ?>
            </label>
            </fieldset>
            <fieldset>
            <label>Peso:</br>
            <?php 
                if($_COOKIE['pesoFichaTecnica']){
                    echo '<span>'. $_COOKIE['pesoFichaTecnica'].'</span>'; 
                }else{
                    echo '';
                }
                ?>
            </label>
            </fieldset>
            <fieldset>
            <label>Coloração:</br>
            <?php 
                if($_COOKIE['coloracaoFichaTecnica']){
                    echo '<span>'. $_COOKIE['coloracaoFichaTecnica'].'</span>'; 
                }else{
                    echo '';
                }
                ?>
            </label>
            </fieldset>
            <fieldset>
            <label>Idade:</br>
            <?php 
                if($_COOKIE['idadeFichaTecnica']){
                    echo '<span>'. $_COOKIE['idadeFichaTecnica'].'</span>'; 
                }else{
                    echo '';
                }
                ?>
            </label>
            </fieldset>
            <fieldset>
            <label>Procedência:</br>
            <?php 
                if($_COOKIE['procedenciaFichaTecnica']){
                    echo '<span>'. $_COOKIE['procedenciaFichaTecnica'].'</span>'; 
                }else{
                    echo '';
                }
                ?>
            </label>
            </fieldset>

    </div>

</body>
</html>