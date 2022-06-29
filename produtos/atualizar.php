<?php
use CrudPoo\Fabricante;
use CrudPoo\Produto;
require_once "../vendor/autoload.php";
$fabricante = new Fabricante;
$produto = new Produto;
$listaDeFabricantes = $fabricante->lerFabricantes();
// Pegando o valor do id e sanitizando
$produto->setId(($_GET['id']));
// Chamando a função e recuperando os dados do produto
$umProduto = $produto->lerUmProduto();
//dump($produto);
if(isset($_POST['atualizar'])) {
    $produto->setNome($_POST['nome']);
    $produto->setPreco($_POST['preco']);
    $produto->setQuantidade($_POST['quantidade']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setFabricanteId($_POST['fabricante']);
    $produto->atualizarProduto();
    header("location:listar.php");
};
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Atualizar</title>
</head>
<body>

<div class="container">
    <h1>Produtos | PRODUTOS | SELECT UPDATE</h1>
    <hr>

    <form action="" method="post">
        <p>
            <label for="nome">Nome:</label>
            <input  value="<?=$umProduto['nome']?>" type="text" name="nome" id="nome">
        </p>

        <p>
            <label for="preco">Preço:</label>
            <input value="<?=$umProduto['preco']?>" type="number" name="preco" id="preco" step="0.01">
        </p>

        <p>
            <label for="quantidade">Quantidade:</label>
            <input value="<?=$umProduto['quantidade']?>" type="number" name="quantidade" id="quantidade" min="0" max="100" step="0.0.1" required>
        </p>

        <p>
            <label for="fabricante">Fabricante:</label>
            <select name="fabricante" id="fabricante" required>
            <option value=""></option>
                             
                <?php foreach ($listaDeFabricantes as $umFabricante) { ?>
                  <!-- O Value do ID é para o banco-->
                <option 
                  
                
                <?php
                /* Se chave estrangeira for idêntica à chave primária (ou seja, se o código do fabricante do produto bater com o código do fabricante), então coloque o atributo selected no option */
                if($umProduto['fabricante_id'] === $umFabricante['id']) echo " selected " ?>
                
                value="<?=$umFabricante['id']?> ">
                        <?=$umFabricante['nome']?> <!-- Exibição -->
                </option>
                
                
                <?php
                }
                ?>

            </select>
        </p>

         <p>
            <label for="descricao">Descrição:</label>

            <textarea requered name="descricao" id="descricao" cols="30" rows="3"><?=$umProduto['descricao']?></textarea>
        </p>

        </p>
        <button type="submit" name="atualizar">Atualizar Produtos</button>
    </form>
</div>

<p><a href="listar.php">Voltar para lista de Produtos</a></p>
<p><a href="../index.php">Home</a></p>





    
</body>
</html>