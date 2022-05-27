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



function inserirProdutos(PDO $conexao, string $nome, float $preco, int $quantidade, string $descricao, int $fabricanteId):void {

    $sql = "INSERT INTO produtos (nome, preco, quantidade, descricao, fabricante_id) VALUES (:nome, :preco, :quantidade, :descricao, :fabricante_id)";


    try {
        
         $consulta = $conexao->prepare($sql);

         $consulta ->bindParam(':nome', $nome, PDO::PARAM_STR);
         $consulta ->bindParam(':preco', $preco, PDO::PARAM_STR); // PDO NAO TEM TRATAMENTO PARA TRATAR NÚMEROS DECIMAIS, POR ISSO USAMOS PARAM_STR.
         $consulta ->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
         $consulta ->bindParam(':descricao', $descricao, PDO::PARAM_STR);
         $consulta ->bindParam(':fabricante_id', $fabricanteId, PDO::PARAM_INT);

         $consulta->execute();




    } catch (Exception $erro) {
        die("erro: ". $erro->getMessage());
    }
};


function lerUmProduto(PDO $conexao, int $id):array {
    
    $sql = "SELECT id, nome, preco, quantidade, preco, fabricante_id FROM produtos WHERE id = :id";

    try {

        $consulta = $conexao->prepare($sql);

        $consulta ->bindParam(':id', $id, PDO::PARAM_INT);

        $consulta->execute();

        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $erro) {
        die("erro: ". $erro->getMessage());
    }

    return $resultado;
};


