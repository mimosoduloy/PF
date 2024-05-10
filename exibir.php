
<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "memories";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta SQL para recuperar os dados dos administradores
$sql = "SELECT nome, email FROM  adm where id='4'";

$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        // Exibe os dados dos administradores
        while($row = $result->fetch_assoc()) {
            echo "Nome: " . $row["nome"]. "<br>";
            echo "E-mail: " . $row["email"]. "<br>";
          
        }
    } else {
        echo "Nenhum administrador encontrado.";
    }
} else {
    echo "Erro na consulta: " . $conn->error;
}

$conn->close();
?>
