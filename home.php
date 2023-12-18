<?php
  session_start();
  include_once('server_connection/conexao.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">VetSystem</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Página principal</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Serviços
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="ficha_tec/fichaTec.php">Ficha Técnica</a></li>
                  <li><a class="dropdown-item" href="#">Listagem de medicamento</a></li>
                  <li><a class="dropdown-item" href="#">Dosagem de medicação</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Telefone de hospitais</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a id="ghost-text" class="nav-link disabled" aria-disabled="true">Olá, seja bem vindo a nossa central de atendimento</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </form>
          </div>
        </div>
    </nav>

    <?php
      
            //recebendo o número da página
            $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
    
            //Setar a quantidade de itens por página
            $qt_result_pg = 4;
    
            //Cálcular o inicio de visualização
            $inicio = ($qt_result_pg * $pagina) - $qt_result_pg;
    
            $result_ficha = "SELECT * FROM registros_fichatec LIMIT $inicio, $qt_result_pg";
            $resultado_ficha = mysqli_query($conn, $result_ficha);
            ?>
            <div class="card-animals">
              <?php
                while($row_user = mysqli_fetch_assoc($resultado_ficha)){
                    echo '<div class="card-animals">';
                    echo '<div class="card" style="width: 18rem;">';
                    echo "<a href='edit_register/editar.php?id=".$row_user['id']."'>Editar</a>";
                    echo "<a href='delete_register/apagar_cadastro.php?id=".$row_user['id']."'>Apagar</a>";
                    echo '<img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">'; echo $row_user['nome']."<br>"; echo '</h5>
                    <p class="card-text">Alguma informação</p>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Raça:'; echo $row_user['raca']."<br>"; echo '</li>
                      <li class="list-group-item">Peso:'; echo $row_user['peso']."<br>"; echo '</li>
                      <li class="list-group-item">Idade:'; echo $row_user['idade']."<br>"; echo '</li>
                      </ul>
                      <div class="card-body">
                      <a href="registers/registros.php" class="card-link">Detalhado</a>
                      <a href="#" class="card-link">Another link</a>
                    </div>
                  </div>';
                  echo '</div>';
                }
              ?>
            </div>
        <div id="redirect-button">
        <?php
            //Paginação - Somar a quantidade de usuários 
            $result_pg = "SELECT COUNT(id) AS num_result FROM registros_fichatec";
            $resultado_pg = mysqli_query($conn, $result_pg);
            $row_pg = mysqli_fetch_assoc($resultado_pg);
            //echo $row_pg['num_result'];
            //Quantidade de páginas:
            $quantidade_pg = ceil($row_pg['num_result'] / $qt_result_pg);
    
            //Limitar os links antes e depois
            $max_links = 2;
            echo "<a style='margin:7px;' href='registers/registros.php?pagina=1'><<";
            for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                if($pag_ant >= 1){
                    echo "<a style='margin:7px;' href='registers/registros.php?pagina=$pag_ant'>$pag_ant";
                }
            }
            //Página atual
            echo "$pagina";
    
            //última pagina
            for($pag_post = $pagina + 1; $pag_post <= $pagina + $max_links; $pag_post++){
                if($pag_post <= $quantidade_pg){
                    echo "<a style='margin:7px;' href='registers/registros.php?pagina=$pag_post'>$pag_post";
                }
            }
            echo "<a style='margin:7px;' href='registers/registros.php?pagina=$quantidade_pg'>>>";
            

        ?>  
        </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>