<?php
require_once "../conecao.php";
if(isset($_GET['id'])){
$id=$_GET['id'];
$sql = "select * from cem join quarteirao_cem on id_cem=cemiterio join quarteirao on id_qua=quarteirao where id_cem=$id";
echo $id;
$busca = $con->query($sql);
echo "<option disabled selected>Escolha o quarteirão</option>";
foreach($busca as $b){
    echo "<option value='$b[id_qt_cem]'>$b[num_qua]</option>";
}}
if(isset($_GET['ed'])){
    $id=$_GET['ed'];   
$sql = "select * from campa_cem left outer join cadavel on cemiterio=id_ca_cem where cem =$id";
$busca = $con->query($sql);
if($busca->num_rows>0){
    echo "<option disabled selected>Escolha a Campa</option>";
foreach($busca as $b){
    if($b['id'] == null){
    echo "<option value='$b[id_ca_cem]'>$b[campa]</option>";
}
}
}else{
    echo "<option value='' disabled selected>Sem campas Disponíveis</option>";   
}
}

