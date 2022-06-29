<?php
namespace CrudPoo;
use PDO, Exception;

final class Produto{
    private int $id;
    private string $nome;
    private float $preco;
    private int $quantidade;
    private string $descricao;
    private int $fabricanteId;
    private PDO $conexao;

    
    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getFabricanteId(): int
    {
        return $this->fabricanteId;
    }

    public function getConexao(): PDO
    {
        return $this->conexao;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }
    
    public function setPreco(float $preco)
    {
        $this->preco = $preco;
    }

    public function setQuantidade(int $quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }


    public function setFabricanteId(int $fabricanteId)
    {
        $this->fabricanteId = $fabricanteId;
    }
   
    public function setConexao(PDO $conexao)
    {
        $this->conexao = $conexao;
    }
 }
?>