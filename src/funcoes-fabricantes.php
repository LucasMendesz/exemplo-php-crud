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

        // bindParam('nome do parametro',$variavel_com_valor, constante de verificação)
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->execute();

    } catch (Exception $erro) {
        die("erro:" .$erro->getMessage());
    };
       
}
?>


