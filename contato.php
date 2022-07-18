<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
</head>
<body>
    <h1>Contato usando php/mailer</h1>
    <hr>

    <p>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
    </p>

    <p>
        <label for="email">E-mail:</label>
        <input type="text"name="email" id="email">
    </p>

    <p>
        <label for="assunto">Assunto:</label>
        <select name="assunto" id="assunto" required>
            <option value=""></option>
            <option value="duvidas">Dúvidas</option>
            <option value="reclamaçoes">reclamações</option>
            <option value="elogios">Elogios</option>
        </select>
    </p>

    <p>
        <label for="mensagem">Mensagem:</label>
        <textarea name="Mensagem" id="Mensagem" cols="30" rows="10"></textarea>
    </p>
     
    <p>
    <button type="submit">Enviar</button>
    </p>
</body>
</html>