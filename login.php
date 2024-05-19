<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Case Mind</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="container" id="login">
        <h1 class="text-center">Login</h1>
        <form action="" method="POST" class="d-flex flex-column">
            <label for="usuario">Usuário</label>
            <input type="text" name="usuario" class="form-control">
            <label for="senha">Senha</label>
            <input type="password" name="senha" class="form-control">
            <a href="cadastro.php" class="mt-3 text-end">Cadastre-se agora</a>
            <input type="submit" class="btn text-light mt-3" name="submit" value="Entrar">
        </form>
    </div>

<?php
include_once 'includes/footer.php';
?>