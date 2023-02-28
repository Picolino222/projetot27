<?php
#variáveis do name do html e abre a conexão com Banco
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $marca = $_POST['marca'];
    include("conectadb.php");

    #VERIFICA USUARIO EXISTENTE
    $sql ="SELECT COUNT(prod_id) from produtos WHERE prod_nome = '$nome' AND prod_marca = '$marca'";
    $resultado = mysqli_query($link,$sql);
    while($tbl = mysqli_fetch_array($resultado)){
        $cont = $tbl[0];
    }
    #Verificação se usuario existe ou não.
    if($cont==1){
        echo"<script>window.alert('PRODUTO JÁ CADASTRADO!');</script>";
    }
    else{
        $sql = "INSERT INTO produtos (prod_nome, prod_marca) VALUES('$nome', '$marca','n')";
        mysqli_query($link,$sql);
        header("Location: listaproduto.php");
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>CADASTRO DE PRODUTOS</title>
</head>
<body>
    <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
   
    </script>

    <form action="cadastraproduto.php" method="POST">
        <h1>CADASTRO DE produtos</h1>
        <input type="text" name="nome" id="nome" placeholder="NOME" required>
        <p></p>
        <input type="text" id="marca" name="marca" placeholder="marca" required>
        
        <p></p>
        <input type="submit" name="cadastrar" id="cadastrar" value="CADASTRAR">
    </form>
    </div>
</body>
</html>