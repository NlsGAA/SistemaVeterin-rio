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

        //recebendo o número da página
        $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

        //Setar a quantidade de itens por página
        $qt_result_pg = 5;

        //Cálcular o inicio de visualização
        $inicio = ($qt_result_pg * $pagina) - $qt_result_pg;

        $result_ficha = "SELECT * FROM registros_fichatec LIMIT $inicio, $qt_result_pg";
        $resultado_ficha = mysqli_query($conn, $result_ficha);
        while($row_user = mysqli_fetch_assoc($resultado_ficha)){
            echo "Id:".$row_user['id']."<br>";
            echo "Nome:".$row_user['nome']."<br>";
            echo "Raça:".$row_user['raca']."<br>";
            echo "<a href='editar.php?id=".$row_user['id']."'>Editar</a><br><hr>";
        }

        //Paginação - Somar a quantidade de usuários 
        $result_pg = "SELECT COUNT(id) AS num_result FROM registros_fichatec";
        $resultado_pg = mysqli_query($conn, $result_pg);
        $row_pg = mysqli_fetch_assoc($resultado_pg);
        //echo $row_pg['num_result'];
        //Quantidade de páginas:
        $quantidade_pg = ceil($row_pg['num_result'] / $qt_result_pg);

        //Limitar os links antes e depois
        $max_links = 2;
        echo "<a style='margin:7px;' href='registros.php?pagina=1'><<";
        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
            if($pag_ant >= 1){
                echo "<a style='margin:7px;' href='registros.php?pagina=$pag_ant'>$pag_ant";
            }
        }
        //Página atual
        echo "$pagina";

        //última pagina
        for($pag_post = $pagina + 1; $pag_post <= $pagina + $max_links; $pag_post++){
            if($pag_post <= $quantidade_pg){
                echo "<a style='margin:7px;' href='registros.php?pagina=$pag_post'>$pag_post";
            }
        }
        echo "<a style='margin:7px;' href='registros.php?pagina=$quantidade_pg'>>>";
        
    ?>
</body>
</html>