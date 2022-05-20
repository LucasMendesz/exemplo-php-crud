<?php
require_once "../src/funcoes-fabricantes.php";

// Obetendo o valor do parâmetro da URL
 $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$fabricante = lerUmFabricante($conexao, $id);

if (isset($_POST['atualizar'])) {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

    atualizarFabricante($conexao, $id, $nome);

    //header("location:listar.php");

    // Mensagem + Refresh
    /*echo "Fabricante atualizado com sucesso!";
    header("Refresh:3; url=listar.php"); */
 
    // Só com o nome do parâmetro
    /*header("location:listar.php?sucesso"); */

    // Com nome de parâmetro e valor
    header("location:listar.php?status=sucesso");
};
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Atualziar</title>
</head>
<body>

<div class="container">
    <h1>Fabricantes | SELECT</h1>
    <hr>



    <form action="" method="post">
        <input type="hidden" name="<?=$fabricante['id']?>">
        <p>
            <label for="text">Nome</label>
            <input value="<?=$fabricante['nome']?>" type="text" name="nome" id="nome">
        </p>
        <button type="submit" name="atualizar">Atualizar fabricante</button>
    </form>
</div>

<p><a href="listar.php">Voltar para lista de fabricante</a></p>
<p><a href="../index.php">Home</a></p>
    
</body>
</html>