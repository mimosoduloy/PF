<?php
// Incluir a biblioteca TCPDF
require_once('tcpdf/tcpdf.php');
$sql = "SELECT  from cadavel ca inner join campa_cem ce on ca.cemiterio=ce.id_ca_cem 
inner join quarteirao_cem qc on ce.cem=qc.id_qt_cem inner join cem c on qc.cemiterio=id_cem
group by nome_cem";

// Configurações do banco de dados
$servidor = "localhost";
$usuario = "root"; // Substitua pelo seu nome de usuário do MySQL
$senha = ""; // Substitua pela sua senha do MySQL
$banco = "memories";

// Conectar ao banco de dados
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verificar se o ID do usuário foi fornecido na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query para obter os dados do usuário com base no ID fornecido
    $sql = "SELECT * from cadavel join campa_cem on cadavel.cemiterio like campa_cem.id_ca_cem 
    join quarteirao_cem on campa_cem.cem = quarteirao_cem.id_qt_cem join cem on quarteirao_cem.cemiterio = cem.id_cem
    WHERE id = '$id'";

    // Executar a query
    $resultado = $conn->query($sql);

    // Verificar se há resultados
    if ($resultado === false) {
        die("Erro ao executar a consulta: " . $conn->error);
    }

    if ($resultado->num_rows > 0) {
        // Obter os dados do usuário
        $row = $resultado->fetch_assoc();
        $nome = $row["nome"];
        $morada = $row["morada"];
        $tell = $row["tell"];
        $campa = $row["campa"];
        $sexo = $row["sexo"];
        $data_ent = $row["data_ent"];
        $bi = $row["bi"];
        $hora = $row["hora"];
        $dh = $row["dh"];
        $nome_cem = $row["nome_cem"];
        $quarteirao = $row["quarteirao"];


        // Criar uma nova instância TCPDF
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        // Adicionar uma nova página
        $pdf->AddPage();

        // Definir fonte e tamanho
        $pdf->SetFont('Helvetica', 'B', 16);

        // Título
        $pdf->Cell(0, 10, 'Comprativo de Enterro', 0, 1, 'C');

        // Quebra de linha
        $pdf->Ln(10);

        // Definir fonte e tamanho para os dados
        $pdf->SetFont('Helvetica', '', 12);

        // Adicionar a imagem ao PDF
        $image_file = 'img/pdfi.jpeg';
        // Alinhar a imagem à direita
        $x = $pdf->getPageWidth() - 100; // 100 é a largura da imagem
        $pdf->Image($image_file, $x, $y = null, $w = 100, $h = 100, $type = '', $link = '', $align = '', $resize = false, $dpi = 300, $palign = '', $ismask = false, $imgmask = false, $border = 0, $fitbox = false, $hidden = false, $fitonpage = false, $alt = '', $altimgs = array());

        // Adicionar os dados do usuário ao PDF
        $pdf->Cell(0, 10, "Nome: $nome", 0, 1);
        $pdf->Cell(0, 10, "Morada: $morada", 0, 1);
        $pdf->Cell(0, 10, "Tell: $tell", 0, 1);
        $pdf->Cell(0, 10, "BI: $bi", 0, 1);
        $pdf->Cell(0, 10, "Cemitério: $nome_cem", 0, 1);
        $pdf->Cell(0, 10, "Quarteirão: $quarteirao", 0, 1);
        $pdf->Cell(0, 10, "Cova: $campa", 0, 1);
      
        $pdf->Cell(0, 10, "Sexo: $sexo", 0, 1);
        $pdf->Cell(0, 10, "Data Do Enterro: $data_ent", 0, 1);
        $pdf->Cell(0, 10, "Hora Do Enterro: $hora", 0, 1);
        $pdf->Cell(0, 10, "Data e Hora: $dh", 0, 1);
        $pdf->SetTextColor(255, 0, 0); // Define a cor do texto para vermelho
        $pdf->Cell(0, 10, "OBS: TRAZER O COMPROVATIVO E BOLETIM DE ÓBITO", 0, 1);
        $pdf->SetTextColor(0, 0, 0); // Retorna a cor do texto para preto
        $pdf->Cell(0, 10, "http://www.memories.com", 0, 1);

        // Saída do PDF
        $pdf_data = $pdf->Output('', 's');

        // Responder com os dados do PDF
        header('Content-Type: application/pdf');
        echo $pdf_data;
    } else {
        echo "Nenhum resultado encontrado para o ID fornecido";
    }
} else {
    echo "ID do usuário não fornecido na URL";
}

// Fechar a conexão
$conn->close();
?>
