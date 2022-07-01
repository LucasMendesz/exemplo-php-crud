<?php
require_once "../vendor/autoload.php";
use CrudPoo\Produto,Diversos\Utilitarios;
$produto = new Produto;
$listaDeProdutos = $produto->lerProdutos();
// Utilitarios::teste($listaDeProdutos); // Teste
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

             <hr>
           <p> <b>ID:</b> <?=$produto['id']?> </p>
           <h3> <b>Nome do produto:</b> <?=$produto['produto']?> </h3>
         <p> <b>Preço:</b> <?=Utilitarios::trataMoeda ($produto['preco'])?> </p>
           <p> <b>Quantidade:</b> <?=$produto['quantidade']?> </p>
           <p> <b>Descrição:</b> <?=$produto['descricao']?> </p>
           <p> <b>Fabricante:</b> <?=$produto['fabricante']?> </p>
           <a href="atualizar.php?id=<?=$produto['id']?> ">Atualizar</a>
           <a class="excluir" href="excluir.php?id=<?=$produto['id']?> ">Excluir</a>

        </article>

    </div>

   <?php 
   }
   ?>
</section>
<script src="../js/confirme.js"></script>
</body>
</html>