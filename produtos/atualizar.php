<?php

require_once "../src/funcoes-fabricantes.php";

$listaDeFabricantes = lerFabricantes($conexao);

if(isset($_POST['inserir'])) {
    require_once "../src/funcoes-produtos.php";

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $fabricanteId = filter_input(INPUT_POST, 'fabricante', FILTER_SANITIZE_NUMBER_INT);

    inserirProdutos($conexao, $nome, $preco, $quantidade, $descricao, $fabricanteId);

    header("location:listar.php");
};


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserir</title>
</head>
<body>

<div class="container">
    <h1>Produtos | INSERT</h1>
    <hr>



    <form action="" method="post">
        <p>
            <label for="nome">nome</label>
            <input type="text" name="nome" id="nome">
        </p>

        <p>
            <label for="preco">preço</label>
            <input type="number" name="preco" id="preco" step="0.01">
        </p>

        <p>
            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" min="0" max="100" step="0.0.1" required>
        </p>

        <p>
            <label for="fabricante">Fabricante:</label>
            <select name="fabricante" id="fabricante" required>
            <option value=""></option>
                             
                <?php foreach ($listaDeFabricantes as $fabricante) { ?>
                  <!-- O Value do ID é para o banco-->
                <option value="<?=$fabricante['id']?> ">
                        <?=$fabricante['nome']?> <!-- Exibição -->
                </option>
                
                
                <?php
                }
                ?>

            </select>
        </p>

         <p>
            <label for="Descricao">Descrição:</label>
            <textarea name="descricao" id="Descrição" cols="30" rows="3" required></textarea>
        </p>

        </p>
        <button type="submit" name="inserir">inserir Produtos</button>
    </form>
</div>

<p><a href="inserir.php">Voltar para lista de Produtos</a></p>
<p><a href="../index.php">Home</a></p>





    
</body>
</html>