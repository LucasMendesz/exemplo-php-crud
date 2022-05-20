<?php

use function PHPSTORM_META\sql_injection_subst;

require_once "conecta.php";

// Carregar os dados dos fabricantes
function lerFabricantes (PDO $conexao):array {

    // String com o comando SQL
    $sql = "SELECT id,nome FROM fabricantes ORDER BY nome ";

    try {
    // Preparação do comando
    $consulta = $conexao->prepare($sql);

    // Execução do comando
    $consulta->execute();

    // Capturar resultados
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
     
    /*
       echo "<pre>";
       var_dump($resultado); // teste
       echo "</pre>" */

    } catch (Exception $erro) {
        die("Erro: " .$erro->getMessage() );

    };
        return $resultado;
};





// Inserir um Fabricante
// void -> indica que a função não tem retorno
function inserirFabricante(PDO $conexao, string $nome ):void {
    // :qualquer_coisa: named parameters
    $sql = "INSERT INTO fabricantes(nome) VALUES (:nome)";

    try {
        // Preparação do comando
        $consulta = $conexao->prepare($sql);

        // bindParam('nome do parametro',$variavel_com_valor, constante de verificação) , tratar os parâmetros
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->execute();

    } catch (Exception $erro) {
        die("erro:" .$erro->getMessage());
    };
       
}

function lerUmFabricante(PDO $conexao, int $id):array {
        $sql = "SELECT id, nome FROM fabricantes WHERE id = :id";
         
        try {
            $consulta = $conexao->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC); 
        } catch (Exception $erro) {
            die("erro:" .$erro->getMessage());
        };
           return $resultado;
};

function atualizarFabricante(PDO $conexao, int $id, string $nome):void {
    $sql = "UPDATE fabricantes SET nome = :nome WHERE id = :id";

    try {
        // Preparação do comando
        $consulta = $conexao->prepare($sql);

        // bindParam('nome do parametro',$variavel_com_valor, constante de verificação) , tratar os parâmetros
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();

    } catch (Exception $erro) {
        die("erro:" .$erro->getMessage());
    };
};


function excluirFabricante(PDO $conexao, int $id):void {
 $sql = "DELETE FROM fabricantes WHERE id = :id";

 try {
     $consulta = $conexao->prepare($sql);

     $consulta->bindParam(':id', $id, PDO::PARAM_INT);
     $consulta->execute();
 } catch (Exception $erro) {
     die("Erro: " .$erro->getMessage() );
 }
};
?>


