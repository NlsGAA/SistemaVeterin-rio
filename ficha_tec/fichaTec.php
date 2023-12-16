<?php
        session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Técnica</title>
    <link rel="stylesheet" href="fichaTec.css">
</head>
<body>
    
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
        }
    ?>

    <form method="POST" action="../include_register/input.php">
        <fieldset>
        
            <legend>Ficha Técnica</legend>

            <label>Nome</br>
                <input type="text" name="nome" placeholder="Nome">
            </label></br>
            <label>Raça</br>
                <input type="text" name="raca" placeholder="Raça">
            </label></br>
            <label>Espécie</br>
                <input type="text" name="especie" placeholder="Espécie">
            </label></br>
            <label>Peso</br>
                <input type="text" name="peso" placeholder="Peso">
            </label></br>
            <label>Coloração</br>
                <input type="text" name="coloracao" placeholder="Coloração">
            </label></br>
            <label>Idade</br>
                <input type="number" name="idade" placeholder="Idade">
            </label></br>
            <label>Procedência</br>
                <input type="text" name="procedencia" placeholder="Procedência">
            </label></br></br>
            <input type="submit" value="Registrar">

        </fieldset>
    </form>

</body>
</html>