<?php
#conexao para o banco de dados
include("conectadb.php");


#instruçao para o bando de dados
#funçao da instruçao: LISTAR TODOS O CONTEUDO DA TABELA usuarios
$sql="SELECT* FROM usuarios Where usu_ativo='s'";
$resultado=mysqli_query($link,$sql);
$ativo="s";
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $ativo="s";
}
else {
        $sql="SELECT*FROM usuarios  WHERE usu_ativo='n'";
        $resultado=mysqli_query($link,$sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA USUARIOS</title>
    <link rel="stylesheet" href="estilo.css">

</head>

<body>
    <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
    <form action="listausuario.php" method="post">
        <input type="radio" name="ativo" value="s" required onclick="submit()"<?=$ativo=='s'?"checeked":""?>>ATIVO<BR>
        <input type="radio" name="ativo" value="n" required onclick="submit()"<?=$ativo=='n'?"checeked":""?>>INATIVO
    </form>
    <div class="container">
        <table border="1">
            <tr>
                <th>NOME</th>
                <th>ALTERAR DADOS</th>
                <th>ATIVO</th>
            </tr>
            <?php
                while ($tbl = mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?= $tbl[1]?></td>
                        <td><a href="alterausuario.php?id=<?= $tbl[0]?>"><input type="button" value="ALTERAR"></a></td>
                        <td><?= $check = ($tbl[3] == "s")?"SIM":"NÃO"?></td>

                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
</body>

</html>