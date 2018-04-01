<?php
require_once("conecta.php");
require_once("class/Produto.php");
require_once("class/Categoria.php");
function listaProdutos($conexao) {
    $produtos = array();
    $resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");

    while($produto_array = mysqli_fetch_assoc($resultado)) {
        $produto = new Produto();
        $categoria = new Categoria();
        $produto->setCategoria($categoria);

        $produto->setId($produto_array["id"]);
        $produto->setNome($produto_array["nome"]);
        $produto->setPreco($produto_array["preco"]);
        $produto->setDescricao($produto_array["descricao"]);
        $produto->setUsado($produto_array["usado"]);
        $categoria->setNome($produto_array["categoria_nome"]);

        array_push($produtos, $produto);
    }

    return $produtos;

}

function buscaProduto($conexao, $id) {
    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    $produto_buscado = mysqli_fetch_assoc($resultado);

    $produto = new Produto();
    $categoria = new Categoria();
    $produto->setCategoria($categoria);

    $produto->setId($produto_buscado["id"]);
    $produto->setNome($produto_buscado["nome"]);
    $produto->setPreco($produto_buscado["preco"]);
    $produto->setDescricao($produto_buscado["descricao"]);
    $produto->setUsado($produto_buscado["usado"]);
    $categoria->setId($produto_buscado["categoria_id"]);

    return $produto;
}

function insereProduto($conexao, Produto $produto) {
    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$produto->getNome()}', {$produto->getPreco()}, 
            '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->isUsado()})";
    $resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function removeProduto($conexao, $id) {
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}

function alteraProduto($conexao, Produto $produto) {
    $query = "update produtos set nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', 
        categoria_id= {$produto->getCategoria()->getId()}, usado = {$produto->isUsado()} where id = {$produto->getId()}";
    return mysqli_query($conexao, $query);
}