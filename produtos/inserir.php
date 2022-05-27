


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserir</title>
</head>
<body>

<div class="container">
    <h1>Produtos | INSERT</h1>
    <hr>



    <form action="" method="post">
        <p>
            <label for="text">Nome</label>
            <input type="text" name="nome" id="nome">
        </p>

        <p>
            <label for="Preço">Preço</label>
            <input type="number" name="preco" id="preco" step="0.01">
        </p>

        <p>
            <label for="Quantidade">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" min="0" max="100" step="0.0.1" required>
        </p>

        <p>
            <label for="Fabricante">Fabricante</label>
            <select name="Fabricante" id="Fabricante" required>
                <option value=""></option>

            </select>
        </p>

         <p>
            <label for="Descricao">Descrição:</label>
            <textarea name="descricao" id="Descrição" cols="30" rows="3" required></textarea>
        </p>

        </p>
        <button type="submit" name="inserir">inserir Produtos</button>
    </form>
</div>

<p><a href="inserir.php">Voltar para lista de Produtos</a></p>
<p><a href="../index.php">Home</a></p>





    
</body>
</html>