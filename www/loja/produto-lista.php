<?php
    require_once("cabecalho.php");

    $produtoDao = new ProdutoDAO($conexao);

    if(isset($_SESSION["success"])) { 
?>
        <p class="alert-success"><?= $_SESSION["success"]?></p>
<?php 
        unset($_SESSION["success"]);
    }
    $produtos = $produtoDao->listaProdutos();
?>

<table class="table table-striped table-bordered">

    <?php foreach($produtos as $produto) : ?>

    <tr>
        <td><?= $produto->getNome() ?></td>
        <td><?= $produto->getPreco() ?></td>
        <td><?= $produto->precoComDesconto() ?></td>
        <td><?= $produto->calculaImposto() ?></td>
        <td><?= substr($produto->getDescricao(), 0, 40) ?></td>
        <td><?= $produto->getCategoria()->getNome() ?></td>
        <td>
            <?php 
                if ($produto->temIsbn()) {
                    echo "ISBN: ".$produto->getIsbn();
                }
            ?>
        </td>
        <td><a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto->getId()?>">alterar</a>
        <td>
            <form action="remover-produto.php" method="post">
                <input type="hidden" name ="id" value="<?=$produto->getId()?>"/>
                <button class="btn btn-danger">remover</button>
            </form>
        </td>
    </tr>

    <?php endforeach ?>
</table>

<?php require_once("rodape.php")?>