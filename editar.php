<?php
include("conecao.php");

// Verifica se o parâmetro 'id' está presente na URL
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    // Consulta os dados do cadáver com base no ID fornecido
    $sql = "SELECT * FROM cadavel WHERE id = $id";
    $resultado = $con->query($sql);
    
    // Verifica se há resultados
    if($resultado->num_rows > 0){
        $cadaver = $resultado->fetch_assoc();
    } else {
        echo "Nenhum cadáver encontrado com este ID.";
        exit; // Encerra o script se nenhum cadáver for encontrado
    }
} else {
    echo "ID do cadáver não fornecido.";
    exit; // Encerra o script se o ID não for fornecido
}

// Consulta os cemitérios para o menu suspenso
$sql_cemiterios = "SELECT id_cem, nome_cem FROM cem";
$resultado_cemiterios = $con->query($sql_cemiterios);
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
  color: ;
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
            background:red;
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
</head>
<body style="background-color:rgb(43, 43, 43)">

    <a href="index.php"><i class="bi-arrow-left" style="color:white" ></i></a>
    <form action="" method="POST" class="form">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?php echo $cadaver['id']; ?>">
        <h1>Editar Cadastro</h1>
        <input type="text" name="nome" value="<?php echo $cadaver['nome']; ?>" required>
        <input type="text" name="bi" value="<?php echo $cadaver['bi']; ?>" required>
        <input type="text" name="morada" value="<?php echo $cadaver['morada']; ?>" required>
        <input type="text"  name="tell" value="<?php echo $cadaver['tell']; ?>" required>
        <select name="sexo" id="sexo" class="form-control">
            <option value="">Gênero</option>
            <option value="Masculino" <?php if($cadaver['sexo'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
            <option value="Feminino" <?php if($cadaver['sexo'] == 'Feminino') echo 'selected'; ?>>Feminino</option>
        </select>
        <select name="cemiterio" id="cem" class="form-control">
            <option disabled>Escolha o Cemitério</option>
            <?php while($row = $resultado_cemiterios->fetch_assoc()): ?>
                <option value="<?php echo $row['id_cem']; ?>" <?php if($row['id_cem'] == $cadaver['cemiterio']) echo 'selected'; ?>><?php echo $row['nome_cem']; ?></option>
            <?php endwhile; ?>
        </select>
        <select name="cemiterio" id="cem" class="form-control">
            <option disabled>Escolha o Cemitério</option>
            <?php while($row = $resultado_cemiterios->fetch_assoc()): ?>
                <option value="<?php echo $row['id_cem']; ?>" <?php if($row['id_cem'] == $cadaver['cemiterio']) echo 'selected'; ?>><?php echo $row['nome_cem']; ?></option>
            <?php endwhile; ?>
        </select>
        <select name="cemiterio" id="cem" class="form-control">
            <option disabled>Escolha o Cemitério</option>
            <?php while($row = $resultado_cemiterios->fetch_assoc()): ?>
                <option value="<?php echo $row['id_cem']; ?>" <?php if($row['id_cem'] == $cadaver['cemiterio']) echo 'selected'; ?>><?php echo $row['nome_cem']; ?></option>
            <?php endwhile; ?>
        </select>
        <!-- Selecione os campos 'quarte' e 'campa' conforme necessário -->
        <input type="time" name="hora" value="<?php echo $cadaver['hora']; ?>" required>
        <input type="date" name="data_ent" value="<?php echo $cadaver['data_ent']; ?>" required>
 
       
        <input type="submit" name="EDITAR_MORTO"  value="Submeter" >
    </form>



</body>
</html>

<?php
// Verifica se o formulário foi enviado
if(isset($_POST['EDITAR_MORTO'])){
    // Captura os dados do formulário
    $nome = $_POST['nome'];
    $bi = $_POST['bi'];
    $morada = $_POST['morada'];
    $sexo = $_POST['sexo'];
    $cemiterio = $_POST['cemiterio'];
    // Capturar outros campos conforme necessário
    
    // Atualiza os dados do cadáver no banco de dados
    $sql_update = "UPDATE cadavel SET nome = '$nome', bi = '$bi', morada = '$morada', sexo = '$sexo', cemiterio = '$cemiterio' WHERE id = $id";
    if($con->query($sql_update) === TRUE){
        echo "<script>alert('Cadastro editado com sucesso.');</script>";
        echo "<script>window.location.href = 'cadastromorto.php';</script>";
    } else {
        echo "Erro ao atualizar o cadastro: " . $con->error;
    }
}
?>
