<?php

require_once "../src/funcoes-produtos.php";

$listaDeProdutos = lerProdutos($conexao);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Lista</title>

</head>
<body>

<section class="container">
    <h1>Produtos | SELECT <a href="../index.php">Home</a></a></h1> 
    <hr>
    <h2>Lendo e carregando todos os produtos</h2>
    <p><a href="inserir.php">Inserir um novo produto</a></p>

   <!--<div class="produtos">

       <article>
           <h3>Nome do produto...</h3>
           <p>Preço...</p>
           <p>Quantidade...</p>
           <p>Descrição...</p>
           <p>Fabricante...</p>
       </article> 

   </div> -->

   <?php 
   foreach ($listaDeProdutos as $produto) {?>

   <div class="produtos">

         <article>

           <p> ID: <?=$produto['id']?> </p>
           <h3> Nome do produto: <?=$produto['nome']?> </h3>
           <p> Preco: <?=$produto ['preco']?> </p>
           <p> Quantidade: <?=$produto['quantidade']?> </p>
           <p> Descrição: <?=$produto['descricao']?> </p>
           <p> Fabricante: <?=$produto['fabricante_id']?> </p>

           <a href="atualizar.php?id=<?=$produto['id']?> ">Atualizar</a>
           <a href="excluir.php?id=<?=$produto['id']?> ">Excluir</a>

        </article>

    </div>

   <?php 
   }
   ?>
</section>

</body>
</html>