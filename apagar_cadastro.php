<?php
    session_start();
    include_once('conexao.php');

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if(!empty($id)){
        $result_ficha= "DELETE FROM registros_fichatec WHERE id = '$id'";
        $resultado_ficha = mysqli_query($conn, $result_ficha);
    
        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<p style='color: green;'>Ficha técnica excluída com sucesso!</p>";
            header('Location: registros.php');
            exit;
        }else{  
            $_SESSION['msg'] = "<p style='color: red;'Ficha técnica não foi excluída com sucesso!</p>";
            header('Location: registros.php');
            exit;
        }
    }else{
        $_SESSION['msg'] = "<p style='color: red;'ID não localizado!</p>";
        header('Location: registros.php');
        exit;
    }
