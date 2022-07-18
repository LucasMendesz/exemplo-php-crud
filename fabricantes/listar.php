<?php

use CrudPoo\Fabricante;
require_once "../vendor/autoload.php";
$fabricante = new Fabricante;

$listaDeFabricantes = $fabricante->lerFabricantes();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Lista</title>

    <style>
    td a{
        color: green;
    }
    </style>

</head>
<body>

<div class="container">
    <h1>Fabricantes | SELECT/UPDATE <a href="../index.php">Home</a></a></h1> 
    <hr>
    <h2>Lendo e carregando todos os fabricantes</h2>

   <p><a href="inserir.php">Inserir um novo fabricante</a>
    <?php
    // Verificando se o parâmetro existe
    if(isset($_GET['exportarPDF'])){
        // Inicializando uma sessão PHP
        session_start();

        // Criando uma variável de sessão
        $_SESSION["dados"] = $listaDeFabricantes;
        
        // Redirecionando para o script de exportação
           header("location:../exportar-pdf.php");
    }
    
    ?>
   <!-- flag/sinalizador com parâmetro exportarPDF -->
   <a href="?exportarPDF">Exportar para PDF</a>
  </p>

   <?php if (isset($_GET['status']) && $_GET['status'] == 'sucesso') {?>
    <p style="color: red;">Fabricante atualizado com sucesso!</p>
    <?php } ?>

    <table>
        <caption style="color: blue;">Lista de Fabricantes</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th colspan="2">Operações</th>
            </tr>
        </thead>
        <tbody>

    <?php
    foreach ($listaDeFabricantes as $fabricante ) {?>
         
           <tr>
              <td> <?=$fabricante['id']?> </td>
              <td> <?=$fabricante['nome']?> </td>
              <td> <a href="atualizar.php?id=<?=$fabricante['id']?>">Atualizar</a> </td>
             <!--  onclick="return confirm('Deseja realmente excluir?')-->
            <td> <a class="excluir" href="excluir.php?id=<?=$fabricante['id']?>">Excluir</a> </td> 
           </tr>

        <?php   
       } 
       ?>

        </tbody>
    </table>
</div>


<script>
    // Acessando todos links com a classe excluir
    const links = document.querySelectorAll('.excluir');
    for( let i = 0; i < links.length; i++) {
        links[i].addEventListener("click", function(event){
            event.preventDefault();
            let resposta = confirm("Deseja realmente excluir?");
            if(resposta)location.href = links[i].getAttribute('href');
        });
    }
</script>
    
</body>
</html>