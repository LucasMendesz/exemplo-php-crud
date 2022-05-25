<?php

require_once "conecta.php";

function lerProdutos(PDO $conexao ) {
   $sql = "SELECT produtos.id,
    produtos.nome AS produto,
     produtos.preco,
      produtos.quantidade,
       produtos.descricao,
        fabricantes.nome AS fabricante
         FROM produtos INNER JOIN fabricantes  ON produtos.fabricante_id = fabricantes.id  ORDER BY produtos.nome";

   try {

    $consulta = $conexao->prepare($sql);
    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
       
   } catch (Exception $erro) {
       die("Erro: " .$erro->getMessage());
   }

   return $resultado;

   
};

/* Funções utilitárias */

 function formataMoeda(float $valor):string {
     return "R$ ". number_format($valor, 2, ",", ".");
 };

function dump($dados) {

       echo "<pre>";
            var_dump($dados);
            "</pre>";
};


