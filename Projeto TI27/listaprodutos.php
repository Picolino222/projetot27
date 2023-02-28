<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA PRODUTOS</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <a href="homesistema.html"><input type="button" name="voltahomesistema" value="HOME SISTEMA"></a>
    <div>
        <table border="1">
        <?php
#conexao com o banco de dados
include("conectadb.php");

$sql="SELECT* FROM produtos Where pro_ativo='s'";
$resultado=mysqli_query($link,$sql);
$ativo="s";
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $ativo="s";
}
else {
        $sql="SELECT*FROM produtos  WHERE pro_ativo='n'";
        $resultado=mysqli_query($link,$sql);
}

#instruçao para o bando de dados
#funçao da instruçao: LISTAR TODOS O CONTEUDO DA TABELA usuarios
// $sql = "SELECT * FROM produtos";
// $resultado = mysqli_query($link, $sql);
// $ativo=$_POST['ativo'];
// if ($ativo=='s') {$ativo=$_POST==[]
    # code...
// }
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
    <form action="listaprodutos.php" method="post">
        <input type="radio" name="ativo" value="s" required onclick="submit()"<?=$ativo=='s'?"checeked":""?>>ATIVO<BR>
        <input type="radio" name="ativo" value="n" required onclick="submit()"<?=$ativo=='n'?"checeked":""?>>INATIVO
    </form>
    <div class="container">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>DESCRIÇAO</th>
                <th>QUANTIDADE</th>
                <th>PRECO</th>
                <th>STATUS</th>
                <th>ALTERAR</th>
            </tr>
            <?php
                while ($tbl = mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?= $tbl[0]?></td>
                        <td><?= $tbl[1]?></td>
                        <td><?= $tbl[2]?></td>
                        <td>R$<?=str_replace('.',',') $tbl[3]?></td>
                        <td><?= $tbl[4]?></td>
                        <td><a href="alteraproduto.php?id=<?= $tbl[0]?>"><input type="button" value="ALTERAR"></a></td>
                        <td><?= $check = ($tbl[5] == "s")?"SIM":"NÃO"?></td>

                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
</body>

</html>
</table>
</div>
</body>
</html>