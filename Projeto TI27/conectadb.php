<?php
#LOCALIZA PC COM BANCO(NOME DO COMPUTADOR)
$servidor = "localhost";
#NOME DO BANCO
$banco = "projetot27";
#USUARIO DE ACESSO
$usuario = "admin";
#SENHA DO USUARIO
$senha = "123";
#LINK DE ACESSO
$link = mysqli_connect($servidor, $usuario, $senha, $banco);
?>
