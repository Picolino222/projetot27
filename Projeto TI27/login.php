<?php
//
#
#CHAMA VARIÁVEIS UTILIZANDO O MÉTODO POST
if($_SERVER['REQUEST_METHOD']=="POST"){
    $nome = $_POST['nome']; #chama varíavel que está no name="nome" html
    $password = $_POST['password']; #chama variável que está no name="password" html
    include("conectadb.php"); #include chama a conexão com o banco de dados no script conectadb.php

    #CONSULTA SQL PARA VERIFICAR USUARIO CADASTRADO
    #instrução de comunicação com o banco de dados
    $sql = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_nome = '$nome' AND usu_senha ='$password' AND usu_ativo = 's'";
    #chama o valor da consulta e cria um array para armazenar
    $resultado = mysqli_query($link,$sql);
    while($tbl = mysqli_fetch_array($resultado)){
        $cont = $tbl[0]; #guarda o valor da coluna no caso a [0]
    }
    #Verifica se o resultado do cont é 0 ou 1
    #Se 0 o Usuario ou Senha estão incorretos
    if($cont==1){
        header("Location: homesistema.html"); #Se usuario e senha corretos, vá para homesistema
    }
    else{
        echo"<script>window.alert('USUARIOS OU SENHA INCORRETOS!');</script>"; # se incorreto apresenta o erro
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN USUARIOS</title>
    <link rel="stylesheet" href="stylecadastra.css">
</head>
<body>
    <div class="container">
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
    <!-- FIM DO SCRIPT PARA MOSTRA SENHA -->
        <form action="login.php" method="POST">
            <h1>LOGIN DE USUARIO</h1>
            <input type="text" name="nome" id="nome" placeholder="Nome">
            <p></p>
            <input type="password" id="senha" name="password" placeholder="Senha">
            <!-- abaixo está a função onclick chamando o script de javascript Il VVVVVVVVV -->
            <img id="olinho" onclick="mostrarsenha()" src="assets/eye.svg">
            <p></p>
            <input type="submit" name="login" value="LOGIN">
        </form>
    </div>
</body>
</html>
