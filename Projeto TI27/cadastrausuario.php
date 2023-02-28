<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    include("conectadb.php");

    #VERIFICA USUARIO EXISTENTE
    $sql ="SELECT COUNT(usu_id) from usuarios WHERE usu_nome = '$nome' AND usu_senha = '$senha'";
    $resultado = mysqli_query($link,$sql);
    while($tbl = mysqli_fetch_array($resultado)){
        $cont = $tbl[0];
    }
#verificação visual se usuario existe ou nao
    if($cont==1){
        echo"<script>window.alert('USUARIO JÁ CADASTRADO!');</script>";
    }
    else{
        $sql = "INSERT INTO usuarios (usu_nome, usu_senha) VALUES('$nome', '$senha')";
        mysqli_query($link,$sql);
        header("Location: listausuarios.php");
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO DE USUARIOS</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
    <div>
        <!-- script para mostrar senha-->
    <script>
        function mostrarsenha(){
            var tipo = document.getElementById("senha");
            if(tipo.type == "password"){
                tipo.type ="text" ;

            }
            else{
                tipo.type = "password";
            }
        }
    </script>

    <form action="cadastrausuario.php" method="POST">
        <h1>CADASTRO DE USUARIOS</h1>
        <input type="text" name="nome" id="nome" placeholder="NOME">
        <p></p>
        <input type="password" id="senha" name="senha" placeholder="SENHA">
        <img id="olinho" onclick="mostrasenha()" src="assets/eye.svg">
        <p></p>
        <input type="submit" name="cadastrar" id="cadastrar" value="CADASTRAR">
    </form>
    </div>
</body>
</html>