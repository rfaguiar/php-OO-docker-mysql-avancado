<?php 
    require_once("cabecalho.php");

    $produtoDao = new ProdutoDAO($conexao);
    $categoriaDao = new CategoriaDAO($conexao);

    $id = $_GET['id'];
    $produto = $produtoDao->buscaProduto($id);
    $categorias = $categoriaDao->listaCategorias();
    $usado = $produto->isUsado() ? "checked='checked'" : "";
?>            
    <h1>Alterando produto</h1>
    <form action="altera-produto.php" method="post">
        <input type="hidden" name="id" value="<?=$produto->getId()?>">
        <table class="table">

            <?php require_once("produto-formulario-base.php"); ?>

            <tr>
                <td>
                    <button class="btn btn-primary" type="submit">Alterar</button>
                </td>
            </tr>
        </table>
    </form>
<?php require_once("rodape.php"); ?>