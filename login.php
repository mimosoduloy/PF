<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/bootstrap.css" rel="stylesheet" >
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: url(./imag7.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        form{
            text-align: center;
            width: 400px;
            height: 85vh;
            display: block;
            background: #fff;
            padding-top: 3em;
            box-shadow: 0 0 12px #000000b6;
            border-radius: 14px;
            transition: .5s;
            cursor: pointer;
            z-index: 1;
            margin-top: 5%;
        }
        form input{
            width: 300px;
            height: 50px;
            color: #262626;
            border-bottom: 2px solid #e6e6e6e0;
            border-top: none;
            border-left: none;
            border-right: none;
            outline: none;
            background: transparent;
            margin-top: 2em;
            font-size: 18px;
            padding-left: 1em;
        }
        form h1{
  
            margin-bottom: 0.02em;
           color:rgb(43, 43, 43);"
        }
        form h1:hover{
            background: white;
            color:rgb(43, 43, 43);
        }
        form input[type="submit"]{
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
        .novoadm{
            color: #119cff;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            margin-top: 1.5em;
            cursor: pointer;
            display: block; /* Garante que o link seja exibido em uma nova linha */
        }
        .novoadm:hover{
            color: #046bb4;
            animation: none;
            transition: .5s;
        }
        form:hover{
            animation: none;
            transition: .5s;
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
            height: 8em;
            margin-top: -20px;
        }
    </style>
</head>
<body style="background-color:rgb(43, 43, 43)">
<?php
// Incluindo o arquivo de conexão com o banco de dados
include("conecao.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verifica se o nome de usuário é "mimoso" e a senha é "123"
    if ($username === "mimoso" && $password === "123") {
        // Inicia a sessão e redireciona para a página index.php
        $_SESSION["username"] = $username;
        echo "<script>alert('Seja Bem vindo!');</script>";
        header("Location: Admin/index.php");
        exit;
    }

    // Consulta SQL para buscar o usuário na tabela 'adm'
    $sql = "SELECT * FROM adm WHERE nome = '$username' AND senha = '$password'";
    $result = $con->query($sql);

    // Verifica se encontrou algum registro
    if ($result->num_rows > 0) {
        // Usuário e senha corretos, inicia a sessão e redireciona para a página index.php
        $_SESSION["username"] = $username;
        echo "<script>alert('Seja Bem vindo!');</script>";
        header("Location: Admin/index2.php");
        exit;
    } else {
        // Credenciais inválidas, exibe mensagem de erro
        echo "<script>alert('Credenciais inválidas. Tente novamente.');</script>";
    }
}
?>
 <a href="index.php"><i class="bi-arrow-left" style="color:white" ></i></a><br><br>

<form action="?page=salvar" method="POST">
<img src="img/memories1.png" alt="">
    <input type="hidden" name="acao" value="editar"><br><br>
    <h1>Administrador</h1>
    <input type="hidden" name="acao" value="editar"><br><br>
    <i class="bi bi-person-fill"></i> <input type="text" placeholder="nome adm" name="username"><br>
    <i class="bi bi-key"></i> <input type="password" placeholder="senha" name="password">
    <input type="submit" value="Entrar" style="">
    
</form>
</body>
</html>
