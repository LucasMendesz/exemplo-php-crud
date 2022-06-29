<?php
namespace CrudPoo;
use PDO,Exception;

final class Fabricante {
  private int $id;
  private string $nome; 
  
 //   Está propriedade receberá os recursos PDO, através da classe Banco (dependência do projeto)
 private PDO $conexao;

 public function __construct()
  {
    // No momento que for criado um objeto a partir da classe Fabricante, automáticamente será feita a conexão com o banco.
    $this->conexao = Banco::conecta();
  }

 public function lerFabricantes ():array {

    // String com o comando SQL
    $sql = "SELECT id,nome FROM fabricantes ORDER BY nome ";

    try {
    // Preparação do comando
    $consulta = $this->conexao->prepare($sql);

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
  }

 public function inserirFabricante():void {
    // :qualquer_coisa: named parameters
    $sql = "INSERT INTO fabricantes(nome) VALUES (:nome)";

    try {
        // Preparação do comando
        $consulta = $this->conexao->prepare($sql);

        // bindParam('nome do parametro',$variavel_com_valor, constante de verificação) , tratar os parâmetros
        $consulta->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $consulta->execute();

    } catch (Exception $erro) {
        die("erro:" .$erro->getMessage());
    };
       
  }

public function lerUmFabricante():array {
  $sql = "SELECT id, nome FROM fabricantes WHERE id = :id";
   
  try {
      $consulta = $this->conexao->prepare($sql);
      $consulta->bindParam(':id', $this->id, PDO::PARAM_INT);
      $consulta->execute();
      $resultado = $consulta->fetch(PDO::FETCH_ASSOC); 
  } catch (Exception $erro) {
      die("erro:" .$erro->getMessage());
  };
     return $resultado;
  }

public function atualizarFabricante():void {
    $sql = "UPDATE fabricantes SET nome = :nome WHERE id = :id";

    try {
        // Preparação do comando
        $consulta = $this->conexao->prepare($sql);

        // bindParam('nome do parametro',$variavel_com_valor, constante de verificação) , tratar os parâmetros
        $consulta->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $consulta->bindParam(':id', $this->id, PDO::PARAM_INT);
        // $consulta->bindParam(':nome', $this->getNome(), PDO::PARAM_STR);
        // $consulta->bindParam(':id', $this->getId(), PDO::PARAM_INT);
        $consulta->execute();

    } catch (Exception $erro) {
        die("erro:" .$erro->getMessage());
    };
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function getNome(): string
  {
    return $this->nome;
  }

  public function setId(int $id)
  {
    $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
  }

  public function setNome(string $nome)
  {
    $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
  }
}


?>