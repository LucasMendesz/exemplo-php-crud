<?php
use CrudPoo\Fabricante;
require_once "../vendor/autoload.php";
$fabricante = new Fabricante;

 $fabricante->setId( $_GET['id'] );
//  Acessamos o objeto, depois acessa o método lerUmFabricante e o resultado fica guardado na variavel $umFabricante
 $umFabricante = $fabricante->lerUmFabricante();
//  var_dump($umFabricante); // Teste

if (isset($_POST['atualizar'])) {
    $fabricante->setNome($_POST['nome']);
    $fabricante->atualizarFabricante();
    header("location:listar.php?status=sucesso");
};
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Atualziar</title>
</head>
<body>

<div class="container">
    <h1>Fabricantes | SELECT</h1>
    <hr>

    <form action="" method="post">
        <input type="hidden" name="<?=$umFabricante['id']?>">
        <p>
            <label for="text">Nome</label>
            <input value="<?=$umFabricante['nome']?>" type="text" name="nome" id="nome">
        </p>
        <button type="submit" name="atualizar">Atualizar fabricante</button>
    </form>
</div>

<p><a href="listar.php">Voltar para lista de fabricante</a></p>
<p><a href="../index.php">Home</a></p>
    
</body>
</html>