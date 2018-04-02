<?php 
    require_once("conecta.php");
    require_once("class/ProdutoDAO.php");

    $produtoDao = new ProdutoDAO($conexao);

    $id = $_POST['id'];
    $produtoDao->removeProduto($id);
    session_start();
    $_SESSION["success"] = "Produto removido com sucesso.";
    header("Location: produto-lista.php");
    die();