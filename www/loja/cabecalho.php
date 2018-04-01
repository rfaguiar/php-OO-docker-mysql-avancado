<?php
    require_once("logica-usuario.php");
    require_once("mostra-alerta.php");
    verificaUsuario();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Minha loja</title>
        <meta charset="utf-8">
        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/loja.css" rel="stylesheet" />
    </head>

    <body>
        
        <header class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <a href="home.php" class="navbar-brand">Minha Loja</a>
            <div class="collapse navbar-collapse" >
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="produto-formulario.php">Adiciona Produto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produto-lista.php">Lista Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sobre.php">Sobre</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="logout.php">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Deslogar</button>
                </form>
            </div>
        </header>

        <div class="container">

            <div class="principal">
                <?php mostraAlerta("success"); ?>
                <?php mostraAlerta("danger"); ?>
            <!-- fim cabecalho.php -->