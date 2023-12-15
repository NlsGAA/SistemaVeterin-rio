<?php
        session_start();
        include_once('conexao.php');
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $result_edit = "SELECT * FROM registros_fichatec WHERE id = '$id'";
        $resultado_edit = mysqli_query($conn, $result_edit);
        $row_edit = mysqli_fetch_assoc($resultado_edit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ficha Técnica</title>
    <link rel="stylesheet" href="fichaTec.css">
</head>
<body>

    <form method="POST" action="edit_cadastro.php">
        <fieldset>
            
            <legend>Editar Ficha Técnica</legend>
            
            
            <input type="hidden" name="id" value="<?php echo $row_edit['id']; ?>">
            <label>Nome</br>
                <input type="text" name="nome" placeholder="Nome" value="<?php echo $row_edit['nome']; ?>">
            </label></br>
            <label>Raça</br>
                <input type="text" name="raca" placeholder="Raça" value="<?php echo $row_edit['raca']; ?>">
            </label></br>
            <label>Espécie</br>
                <input type="text" name="especie" placeholder="Espécie" value="<?php echo $row_edit['especie']; ?>">
            </label></br>
            <label>Peso</br>
                <input type="text" name="peso" placeholder="Peso" value="<?php echo $row_edit['peso']; ?>">
            </label></br>
            <label>Coloração</br>
                <input type="text" name="coloracao" placeholder="Coloração" value="<?php echo $row_edit['coloracao']; ?>">
            </label></br>
            <label>Idade</br>
                <input type="number" name="idade" placeholder="Idade" value="<?php echo $row_edit['idade']; ?>">
            </label></br>
            <label>Procedência</br>
                <input type="text" name="procedencia" placeholder="Procedência" value="<?php echo $row_edit['procedencia']; ?>">
            </label></br></br>
            <input type="submit" value="Editar">

        </fieldset>
    </form>

</body>
</html>