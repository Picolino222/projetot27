<?php 
#banco de dados
include('conectadb.php');

#variaveis capos de texto HTML
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $id =$_POST['id'];
    $nome =$_POST['nome'];
    $descricao =$_POST['descricao'];
    $quantidade =$_POST['quantidade'];
    $preco =$_POST['preco'];
    $ativo =$_POST['ativo'];
    #Instruçao sql para atualizaçao de usuario e senha
    $sql="UPDATE produtos SET pro_drescricao='$descricao',pro_nome='$nome',pro_ativo='$ativo',pro_quantidade='$quantidade  WHERE pro_id=$id";
    mysqli_query($link,$sql);
   
    header("Location:listausuario.php");
    echo"<script>window.alert('produto ALTERNADO COM SUCESSO! ');</script>";
    exit();
}
// $id=$_GET['id'];
// $sql="SELECT * FROM produtos WHERE pro_id='$id'";
// $resultado= mysqli_fetch_array($link,$sql);

#id link exemplo alteusuario.php?id=2
$id = $_GET['id'];
$sql ="SELECT * FROM produtos WHERE pro_id='$id'";
$resultado=mysqli_query($link,$sql);
while ($tbl=mysqli_fetch_array($resultado)) {
  
    $nome=$tbl[1];
    $senha=$tbl[2];
    $ativo=$tbl[3];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>alteraproduto</title>
</head>
<body>
    <div>
        <form action="ateraproduto.php" method="post">
            <input type="hidden" name="id" value="<?=$id?>">
            <label>NOME</label>
            <input type="text" name="nome",value=",<?=$nome?>"required>
            <input type="text" name="descricao",value=",<?=$descricao?>"required>
            <input type="number" name="quantidade",value=",<?=$quantidade?>"required>
            <input type="number" name="preco",value=",<?=$preco?>"required>
            <br></br>
            <label>Status: <?=$check = ($ativo == 's')?"ATIVO":"INATIVO";?></label>
        <input type="radio" name="ativo" value="s" <?=$ativo == "s"? "checked":""?>>ATIVO<br>
        <input type="radio" name="ativo" value="n"<?=$ativo == "n"? "checked":""?>>INATIVO

        <input type="submit" value="SALVAR">
            
    </div>
    
</body>
</html>