<?php
namespace CrudPoo;

final class Fabricante {
  private int $id;
  private string $nome;   

  
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
    $this->id = $id;
  }

  public function setNome(string $nome)
  {
    $this->nome = $nome;

    
  }
}


?>