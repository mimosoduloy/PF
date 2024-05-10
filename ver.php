<?php
session_start();
include_once "../conecao.php"; 
$sql = "SELECT count(nome_cem) as total,nome_cem from cadavel ca join campa_cem ce on ca.cemiterio=ce.id_ca_cem 
join quarteirao_cem qc on ce.cem=qc.id_qt_cem join cem c on qc.cemiterio=id_cem
group by nome_cem";
$dados = $con->query($sql);
if(!isset($_SESSION['username'])){
  header('Location:../login.php');
}?>
 <?php
                     
                     $sql = "select count(id) as tot from cadavel";
                     $a = $con->query($sql)->fetch_object();
                     ?>
      <?php
// Inclua o arquivo de conexão com o banco de dados
// Substitua 'seu_arquivo_de_conexao.php' pelo nome do seu arquivo de conexão


// Defina variáveis padrão para evitar erros de variável indefinida
$nome = "";
$email = "";
$endereco = "";
$numero = "";
$ft = "";

// Verifique se um ID foi passado via URL
if(isset($_GET['id'])) {
    // Limpe e valide o ID
    $id = $_GET['id']; // Isso pode precisar de mais validação, dependendo da sua aplicação

    // Execute a consulta SQL para recuperar os dados do usuário
    $sql = "SELECT * FROM adm WHERE id = '6'"; // Substitua "usuarios" pelo nome da tabela e "id" pelo campo que identifica o usuário

    $resultado = $con->query($sql);

    // Verifique se a consulta retornou algum resultado
    if ($resultado->num_rows > 0) {
        // Extrair os dados do usuário e armazená-los em variáveis
        $row = $resultado->fetch_assoc();
        $nome = $row["nome"];
        $email = $row["email"];
        $endereco = $row["endereco"];
        $numero = $row["numero"];
        $ft_blob = $row["ft"];
        $ft_base64 = base64_encode($ft_blob);
        // Exiba os dados do usuário
    } else {
        // Se não houver resultados, exiba uma mensagem de erro
        echo "Nenhum registro encontrado";
    }
} else {
    // Se nenhum ID foi passado via URL, exiba uma mensagem de erro
    echo "ID não fornecido na URL";
}
?>


<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">

<style>
    /* Reduz o tamanho das células da tabela */
    .table-sm th,
    .table-sm td {
        padding: 0.1rem 0.2rem; /* Reduz o padding vertical */
        font-size: 14px; /* Aumenta o tamanho da fonte */
    }

    /* Estiliza as bordas da tabela */
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6; /* Define a cor das bordas */
    }
</style>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <h1 style="  color:rgb(43, 43, 43)"> @Memories</h1> 
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search" style="  color:rgb(43, 43, 43)"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown"  style="color:rgb(43, 43, 43)">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown"  style="color:rgb(43, 43, 43)">
            <i class="bi bi-bell"  style="color:rgb(43, 43, 43)"></i>
            <span class="badge bg-primary badge-number"  style="background:rgb(43, 43, 43)" >4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              Tens 4 novas notificações
              <a href="#"  style="color:rgb(43, 43, 43)"><span class="badge rounded-pill bg-primary p-2 ms-2"  style="background:rgb(43, 43, 43)">Ver tudo</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Mostar todas notificações</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              Tens 3 novas mensagens
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Ver tudo</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Ver todas mensagens</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/mimoso.jpeg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"  style="color:rgb(43, 43, 43)">Mbanino Mbala</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6 style="color:rgb(43, 43, 43)">Mbanino Mbala</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>Meu perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-gear"></i>
                <span>Acerca de definições</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.php">
                <i class="bi bi-question-circle"></i>
                <span>Precisa de ajuda?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../sair.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php" style=" font-size: 25px">
          <i class="bi bi-grid" style=" font-size: 20px; color:rgb(43, 43, 43)"></i>
          <span style=" font-size: 20px; color:rgb(43, 43, 43)">Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->



      

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart" style=" font-size: 20px; color:rgb(43, 43, 43)"></i><span style=" font-size: 20px; color:rgb(43, 43, 43)">Falecido</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../cadastromorto.php">
              <i class="bi bi-circle" style=" font-size: 20px; color:rgb(43, 43, 43)"></i><span style=" font-size: 20px; color:rgb(43, 43, 43)">Cadastrar</span>
            </a>
          </li>
          <li>
            <a href="../listaradm.php">
              <i class="bi bi-circle" style=" font-size: 20px; color:rgb(43, 43, 43)"></i><span style=" font-size: 20px; color:rgb(43, 43, 43)">Lista</span>
            </a>
          </li>
        
        </ul>
      </li><!-- End Charts Nav -->

     

      <li class="nav-heading" style="  color:rgb(43, 43, 43)">Páginas</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
          <i class="bi bi-person" style=" font-size: 20px; color:rgb(43, 43, 43)"   ></i>
          <span style=" font-size: 20px; color:rgb(43, 43, 43)">Perfil</span>
        </a>
      </li><!-- End Profile Page Nav -->

  

      <li class="nav-item">
        <a class="nav-link collapsed" href="../contact.php">
          <i class="bi bi-envelope" style=" font-size: 20px; color:rgb(43, 43, 43)"></i>
          <span style=" font-size: 20px; color:rgb(43, 43, 43)">Contactos</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../cadastromorto.php">
          <i class="bi bi-card-list" style=" font-size: 20px; color:rgb(43, 43, 43)"></i>
          <span style=" font-size: 20px; color:rgb(43, 43, 43)">Registar</span>
        </a>
      </li><!-- End Register Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="../cadastaradm.php">
          <i class="bi bi-card-list"style=" font-size: 20px; color:rgb(43, 43, 43)"></i>
          <span style=" font-size: 20px; color:rgb(43, 43, 43)">Cadastrar adm</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../sair.php">
          <i class="bi bi-box-arrow-in-right" style=" font-size: 20px; color:rgb(43, 43, 43)"></i>
          <span style=" font-size: 20px; color:rgb(43, 43, 43)">Log out</span>
        </a>
      </li><!-- End Login Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main " style=" font-size: 20px; width:115%; ">

  
<div style="background-color: rgb(182, 182, 182); height:1000vh; width:100%">
    <center><h1>Listando os cadáveres</h1></center><br>
    <form action="" method="GET">
        <label for="search">Pesquisar:</label>
        <input type="text" id="search" name="search">
        <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
    </form>
    <div class="tabela">  
        <?php
        include("conecao.php");

        $sql = "select * from cadavel c join campa_cem ca on c.cemiterio=ca.id_ca_cem
                join quarteirao_cem q on ca.cem=q.id_qt_cem join cem on q.cemiterio=id_cem"; 
        $busca = $con->query($sql);
        $qtd = $busca->num_rows;

        // Adiciona a classe table-bordered para estilizar as bordas da tabela
        print "<table class='table table-hover table-striped table-sm table-bordered'>";
        print "<tr>";
        print "<th class='col-sm-1'>Id</th>";  
        print "<th class='col-sm-2'>Nome</th>";
        print "<th class='col-sm-1'>Nº Bi</th>";
        print "<th class='col-sm-3'>Morada</th>";
        print "<th class='col-sm-1'>Sexo</th>";
        print "<th class='col-sm-1'>Cemitério</th>";
        print "<th class='col-sm-1'>Quarteirão</th>";
        print "<th class='col-sm-1'>Cova</th>";
        print "<th class='col-sm-1'>Hora do Enterro</th>";
        print "<th class='col-sm-1'>Data do Enterro</th>";
        print "<th class='col-sm-1'>Tell</th>";
        print "<th class='col-sm-1'>Horário do Cadastro</th>";
        print "<th class='col-sm-1'>PDF</th>";

        print "</tr>";

        if(isset($_GET['search'])) {
            $search = $_GET['search'];

            // Prepara a consulta SQL
            $sql = "select * from cadavel c join campa_cem ca on c.cemiterio=ca.id_ca_cem
                    join quarteirao_cem q on ca.cem=q.id_qt_cem join cem on q.cemiterio=id_cem WHERE nome LIKE '%$search%'";

            // Executa a consulta SQL
            $result = $con->query($sql);

            // Exibe os resultados da busca
            if ($result->num_rows > 0) {
                echo "<h2>Resultados da busca: $search</h2>";
                while ($row = $result->fetch_object()) {
                    print "<tr>";
                    print "<td class='col-sm-1'>$row->id</td>";
                    print "<td class='col-sm-2'>$row->nome</td>";
                    print "<td class='col-sm-1'>$row->bi</td>";
                    print "<td class='col-sm-3'>$row->morada</td>";
                    print "<td class='col-sm-1'>$row->sexo</td>";
                    print "<td class='col-sm-1'>$row->nome_cem</td>";
                    print "<td class='col-sm-1'>$row->quarteirao</td>";
                    print "<td class='col-sm-1'>$row->campa</td>";
                    print "<td class='col-sm-1'>$row->hora</td>";
                    print "<td class='col-sm-1'>$row->data_ent</td>";
                    print "<td class='col-sm-1'>$row->tell</td>";
                    print "<td class='col-sm-1'>$row->dh</td>";
                    print "<td class='col-sm-1'>
                              <button onclick=\"location.href='pdf.php?pdf&id=$row->id';\" class='btn btn-primary btn-sm'>PDF</button>
                              
                           </td>";
                    print "</tr>";
                }
            } else {
                print "Nenhuma memória encontrada para '$search'.";
            }
        } else {
            if($qtd > 0){ 
                while ($row = $busca->fetch_object()){
                    print "<tr>";
                    print "<td class='col-sm-1'>$row->id</td>";
                    print "<td class='col-sm-2'>$row->nome</td>";
                    print "<td class='col-sm-1'>$row->bi</td>";
                    print "<td class='col-sm-3'>$row->morada</td>";
                    print "<td class='col-sm-1'>$row->sexo</td>";
                    print "<td class='col-sm-1'>$row->nome_cem</td>";
                    print "<td class='col-sm-1'>$row->quarteirao</td>";
                    print "<td class='col-sm-1'>$row->campa</td>";
                    print "<td class='col-sm-1'>$row->hora</td>";
                    print "<td class='col-sm-1'>$row->data_ent</td>";
                    print "<td class='col-sm-1'>$row->tell</td>";
                    print "<td class='col-sm-1'>$row->dh</td>";
                    print "<td class='col-sm-1'> <button onclick=\"location.href='pdf.php?pdf&id=$row->id';\" class='btn btn-primary btn-sm'>PDF</button>";
                    
                    print "</tr>";
                }
                print "</table>";
            } else {
                print "<p>Nâo encontrou resultados!</p>";
            }
        }
        ?>

        <?php 
        if(isset($_GET['action'] ) && $_GET['action'] === 'delete') {
            $sql = "DELETE FROM cadavel WHERE id=".$_GET["id"];
            $busca= $con->query($sql);

            if($busca == true){
                print "<script>alert('Excluído com sucesso');</script>";
                print "<script>location.href='listaradm.php'; </script>";
            } else {
                print "<script>alert('Nâo foi possível Excluír');</script>";
                print "<script>location.href='listaradm.php'; </script>";
            }
        }
        ?>
    </div>
</div>


<!-- ======= Footer ======= -->
<footer id="footer" class="footer" style=" color:rgb(43, 43, 43)">
    <div class="copyright" style=" color:rgb(43, 43, 43)">
      &copy; Copyright <strong><span>@memories</span></strong>. All Rights Reserved
    </div>
    <div class="credits" style="  color:rgb(43, 43, 43)">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://memories.com/" style="  color:rgb(43, 43, 43)">  Mbanino & Carlos </a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center" style="  background-color:rgb(43, 43, 43)"><i class="bi bi-arrow-up-short" style="  background-color:rgb(43, 43, 43)"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>