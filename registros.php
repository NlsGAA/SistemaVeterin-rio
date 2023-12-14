<?php
    session_start();
    include_once('conexao.php');

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

    <h1>Pacientes Registrados</h1>
    
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
        }

        $result_ficha = "SELECT * FROM registros_fichatec";
        $resultado_ficha = mysqli_query($conn, $result_ficha);
        while($row_user = mysqli_fetch_assoc($resultado_ficha)){
            echo "Id:".$row_user['id']."<br>";
            echo "Nome:".$row_user['nome']."<br>";
            echo "Raça:".$row_user['raca']."<br><hr>";
        }
    ?>
</body>
</html>