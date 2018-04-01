<?php
    require_once("cabecalho.php");
    require_once("banco-produto.php"); 
    require_once("class/Produto.php");
    require_once("class/Categoria.php");

    $produto = new Produto();
    $categoria = new Categoria();
    $produto->setCategoria($categoria);

    $produto->setNome($_POST["nome"]);
    $produto->setPreco($_POST["preco"]);
    $produto->setDescricao($_POST["descricao"]);
    $categoria->setId($_POST["categoria_id"]);
    if(array_key_exists('usado', $_POST)) {
        $produto->setUsado("true");
    } else {
        $produto->setUsado("false");
    }
    
    if(insereProduto($conexao, $produto)) {
?>
<p class="text-success">Produto <?= $produto->getNome(); ?>, <?= $produto->getPreco(); ?> adicionado com sucesso!</p>
<?php
    } else {
        $msg = mysqli_error($conexao);
?>
<p class="text-danger">O produto <?= $produto->setNome(); ?> não foi adicionado:</br> <?= $msg ?></p>
<?php
    }
?>

<?php require_once("rodape.php")?>