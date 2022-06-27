<?php
use CrudPoo\Fabricante;
require_once "../vendor/autoload.php";
// Verificando se o botão do formulário foi acionado
if( isset($_POST['inserir']) ) {
    $fabricante = new Fabricante;

    $fabricante->setNome($_POST['nome']);
     
    // Chamando a função e passando os dados de conexão e o nome digitado
    inserirFabricante($conexao, $nome);
     
    // Redirecionamento
    header("location:listar.php");
    $listaDeFabricantes = $fabricante->inserirFabricante();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Inserir</title>
</head>
<body>

<div class="container">
    <h1>Fabricantes | INSERT</h1>
    <hr>

    <form action="" method="post">
        <p>
            <label for="text">Nome</label>
            <input type="text" name="nome" id="nome">
        </p>
        <button type="submit" name="inserir">inserir fabricante</button>
    </form>
</div>

<p><a href="inserir.php">Voltar para lista de fabricante</a></p>
<p><a href="../index.php">Home</a></p>
    
</body>
</html>