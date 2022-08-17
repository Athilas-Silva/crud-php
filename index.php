<?php 
    require('db/connection.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>CRUD PHP</h1>

    <main class="container">
        <form method="post" id="form_save" class="form">
            <input type="text" name="nome" placeholder="Digite seu nome" required>

            <input type="number" name="idade" placeholder="Digite sua idade">

            <input type="text" name="telefone" placeholder="Digite seu telefone">
            
            <input type="email" name="email" placeholder="Digite seu email">

            <button type="submit" name="save">Salvar</button>
        </form>

        <form method="post" id="form_edit" class="form hidden">
            <input type="hidden" id="id_editado" name="id_editado" placeholder="Digite o ID">
            
            <input type="text" id="nome_editado" name="nome_editado" placeholder="Digite seu nome" required>

            <input type="number" id="idade_editado" name="idade_editado" placeholder="Digite sua idade">

            <input type="text" id="telefone_editado" name="telefone_editado" placeholder="Digite seu telefone">

            <input type="email" id="email_editado" name="email_editado" placeholder="Digite seu email">

            <button type="submit" name="atualizar">Atualizar</button>
            <button type="button" id="cancelar" name="cancelar">Cancelar</button>
        </form>

        <form method="post" id="form_delete" class="form hidden">
            <input type="hidden" id="id_deletar" name="id_deletar" placeholder="Digite o ID">

            <input type="hidden" id="nome_deletar" name="nome_deletar" placeholder="Digite seu nome" required>

            <input type="hidden" id="idade_deletar" name="idade_deletar" placeholder="Digite sua idade">

            <input type="hidden" id="telefone_deletar" name="telefone_deletar" placeholder="Digite seu telefone">

            <input type="hidden" id="email_deletar" name="email_deletar" placeholder="Digite seu email">

            <strong>Tem certeza que quer deletar o cliente <span id="cliente"></span>?</strong>

            <button type="submit" name="deletar">Confirmar</button>
            <button type="button" id="cancelar_deletar" name="cancelar_deletar">Cancelar</button>
        </form>
    </main>

    <?php
        require('db/querys.php'); 
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>