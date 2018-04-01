<?php
    require_once("banco-usuario.php");
    require_once("logica-usuario.php");

    $usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);
    if($usuario != null) {
        logaUsuario($usuario["email"]);
        header("Location: home.php");
    } else {
        $_SESSION["danger"] = "Usuário ou senha inválido.";
        header("Location: index.php");
    }
    die();