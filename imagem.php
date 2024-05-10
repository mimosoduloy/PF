
    <?php
    include_once "../conecao.php";
$titulo ="Upload de imagens ";
if(isset ($_FILE["imagem"]) && !empty($_FILE["imagem"]) )
{
    move_uploaded_file($_FILES["imagem"]["tmp_name"], "./img/".$_FILES["imagem"]["name"]);
    echo " Update realizado com sucesso";
}
 

?>
<div class="row">
<div class="col-md-4">
    <form action=""  method="POST" enctype="multipart/form-data"> 
<label for="imagem.php"></label>
<input type="file" name="imagem" accept="imagem/*" class="form-control">
<button type="submit" class="btn btn-sucess">
Enviar imagem
</button>
    </form>

</div>
</div>