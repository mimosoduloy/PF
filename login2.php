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
            height: 88vh;
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
            color: #119cff;
            margin-bottom: 0.02em;
        }
        form input[type="submit"]{
            background: #119cff;
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            border-radius: 30px;
            text-align: center;
            margin-top: 2em;
            cursor: pointer;
        }
        form input[type="submit"]:hover{
            background: #046bb4;
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
            height: 80px;
        }
    </style>
<?php
session_start();

// Função para se conectar ao banco de dados
function conectarBanco() {
    $servername = "localhost";
    $username = "root"; // Insira seu nome de usuário do MySQL aqui
    $password = ""; // Insira sua senha do MySQL aqui
    $dbname = "memories"; // Insira o nome do seu banco de dados aqui

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    return $conn;
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    // Conecta-se ao banco de dados
        $conn = conectarBanco();

        // Prepara e executa a consulta SQL para obter as credenciais do usuário
        $sql = "SELECT * FROM adm WHERE nome = '$nome'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Usuário encontrado, verificar senha
            $row = $result->fetch_assoc();
        if ($senha === $row["senha"]) {
            // Senha correta, iniciar sessão
            $_SESSION["nome"] = $nome;
            // Redirecionar para a página de perfil ou qualquer outra página protegida
            header("Location: perfil.php");
            exit();
        } else {
            // Senha incorreta
            echo "Credenciais inválidas. Tente novamente.";
        }
    } else {
        // Usuário não encontrado
        echo "Usuário não encontrado. Tente novamente.";
    }

    // Fechar conexão com o banco de dados
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action=" " method="post">
    <img src="img/imag2.jpeg" alt="">
    <input type="hidden" name="acao" value="editar"><br><br>
    <h1>Administrador</h1>
    <input type="hidden" name="acao" value="editar"><br><br>
    <i class="bi bi-person-fill"></i> <input type="text" placeholder="nome adm" name="username"><br>
    <i class="bi bi-key"></i> <input type="password" placeholder="senha" name="password">
    <input type="submit" value="Entrar">
    <a href="cadastaradm.php" class="novoadm">Cadastrar Adm</a>
</form>
</body>
</html>
