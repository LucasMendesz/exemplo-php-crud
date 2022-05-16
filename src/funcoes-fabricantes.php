<?php
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

    } catch (Exepction $erro) {
        die("Erro: " .$erro->getMenssage() );

    };
        return $resultado;
};
?>