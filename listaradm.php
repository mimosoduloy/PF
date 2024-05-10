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
        print "<table class='table table-hover table-striped table-sm table-bordered'  >";
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
        print "<th class='col-sm-1'>Estado</th>";
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
                    print "<td class='col-sm-1'>$row->dh</td>";
                    print "<td class='col-sm-1'>
                    <button onclick=\"location.href='pdf.php?pdf&id=$row->id';\" class='btn btn-primary btn-sm'>PDF</button>
                               <button onclick=\"location.href='editar.php?editar&id=$row->id';\" class='btn btn-success btn-sm'>Editar</button>
                               <button onclick=\"if (confirm('Tem certeza que deseja excluir?')){ location.href='?action=delete&id=$row->id';} else{false;}\" class='btn btn-danger btn-sm'>Excluir</button>
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
                    print "<td class='col-sm-1'><button onclick=\"location.href='pdf.php?pdf&id=$row->id';\" class='btn btn-primary btn-sm'>PDF</button></td>";
                    print "<td class='col-sm-1'>
                               <button onclick=\"location.href='editar.php?editar&id=$row->id';\" class='btn btn-success btn-sm'>Editar</button>
                               <button onclick=\"if (confirm('Tem certeza que deseja excluir?')){ location.href='?action=delete&id=$row->id';} else{false;}\" class='btn btn-danger btn-sm'>Excluir</button>
                           </td>";
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
