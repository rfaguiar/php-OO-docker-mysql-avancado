<?php 
    require_once("cabecalho.php");
    require_once("banco-categoria.php");
    require_once("class/Produto.php");
    require_once("class/Categoria.php");


    $categoria = new Categoria();
    $categoria->setId(1);

    $produto = new Produto();
    $produto->setCategoria($categoria);

    $usado = "";
    
    $categorias = listaCategorias($conexao);
?>
  <h1>Formulário de cadastro</h1>
    <form action="adiciona-produto.php" method="post">
        <table class="table">

            <?php require_once("produto-formulario-base.php"); ?>

            <tr>
                <td></td>
                <td><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
            </tr>

        </table>
    </form>
<?php require_once("rodape.php"); ?>