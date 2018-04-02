<?php
    require_once("cabecalho.php");

    $tipoProduto = $_POST['tipoProduto'];

    $factory = new ProdutoFactory();
    $produto = $factory->criaPor($tipoProduto, $_POST);
    $produto->atualizaBaseadoEm($_POST);

    $produto->getCategoria()->setId($_POST['categoria_id']);

    if(array_key_exists('usado', $_POST)) {
        $produto->setUsado("true");
    } else {
        $produto->setUsado("false");
    }

    $produtoDao = new ProdutoDAO($conexao);

    if($produtoDao->insereProduto($produto)) {
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