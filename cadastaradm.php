<?php
// Definindo a senha do administrador atual
$vsenha = "123"; // Substitua pela senha real do administrador atual

// Verifica se o formulário foi submetido
if(isset($_POST['CADASTRO_ADM'])) {
    // Recuperando os dados do formulário
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    $email = $_POST["email"];
    $numero = $_POST["numero"];
    $endereco = $_POST["endereco"];
    $sa = $_POST["sa"];
    $ft = $_POST["ft"];
    
    // Verifica se a senha fornecida pelo usuário é igual à senha do administrador atual
    if ($vsenha !== $sa) {
        echo "<script>alert('Senha do administrador atual incorreta');</script>";
        echo "<script>alert('Não foi possível cadastrar');</script>";
    } else {
        // Incluindo o arquivo de conexão com o banco de dados
        include("conecao.php");
        
        // Preparando a consulta SQL para inserir os dados na tabela 'adm'
        $sql = "INSERT INTO adm (nome, senha, email, numero, endereco, sa,ft)
                VALUES ('{$nome}', '{$senha}', '{$email}', '{$numero}', '{$endereco}', '{$sa}', '{$ft}')";

        // Executando a consulta
        $cadastro = $con->query($sql);

        // Verificando se o cadastro foi bem-sucedido
        if($cadastro) {
            echo "<script>alert('Adm Cadastrado com sucesso');</script>";
            echo "<script>location.href='login.php';</script>";
        } else {
            echo "<script>alert('Não foi possível cadastrar');</script>";
            echo "<script>location.href='cadastaradm.php';</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro_morto</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Courier New', Courier, monospace;
        }

        main {
            min-height: 100vh;
        }

        form {
            text-align: center;
            max-width: 800px;
            margin: 3em auto;
            padding: 2em;
            background: #ffffff;
            box-shadow: 0 0 12px #000000b6;
            border-radius: 14px;
            transition: .5s;
        }

        form input,
        form select {
            width: 100%;
            max-width: 300px;
            height: 50px;
            color: #262626;
            border: 2px solid #e6e6e6e0;
            outline: none;
            background: transparent;
            margin: 1em auto;
            font-size: 18px;
            padding-left: 1em;
        }

        form h1{
  
  margin-bottom: 0.02em;
 color:rgb(43, 43, 43);"
}
form h1:hover{
  color: red;
  margin-bottom: 0.02em;
}

        form input[type="submit"] {
            BACKGROUND-color:rgb(43, 43, 43);
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            border-radius: 30px;
            text-align: center;
            margin-top: 2em;
            cursor: pointer;
        }

        form input[type="submit"]:hover{
            background: white;
            color:rgb(43, 43, 43);
        }

        a {
            width: 50px;
            height: 50px;
            position: absolute;
            top: 0;
            left: 0;
            text-decoration: none;
        }
        form img{
        height:8em;
    }  


    </style>
</head>
<body style="background-color:rgb(43, 43, 43)">

<a href="index.php"><i class="bi-arrow-left" style="color:white" ></i></a>
    <form method="POST" class="form" enctype="multipart/form-data">
        <input type="hidden" name="acao" value="cadastrar">
        <img src="img/memories1.png" alt="">
        <h1>Cadastrando adm</h1>
        <input type="text" placeholder="Nome" name="nome" required class="form-control">
        <input type="password" placeholder="Senha" name="senha" required class="form-control"  >
        <input type="text" placeholder="Numero" name="numero" required class="form-control">
        <input type="text" placeholder="Morada" name="endereco" required class="form-control">
        <input type="text" placeholder="Email" name="email" required class="form-control">
        <input type="password" placeholder="Id do adm " name="sa" required class="form-control">
        <input type="file"  nmae="ft" required ><br>
       
        
        <input type="submit" name="CADASTRO_ADM"  value="Submeter" >
    </form>

    <script src="js/verificar.js"></script>
  
</body>
</html>
