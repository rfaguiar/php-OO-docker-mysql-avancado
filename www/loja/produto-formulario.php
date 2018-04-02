<?php 
    require_once("cabecalho.php");

    $categoriaDao = new CategoriaDAO($conexao);

    $categoria = new Categoria();
    $categoria->setId(1);

    $produto = new LivroFisico("", "", "", $categoria, "");

    $usado = "";
    
    $categorias = $categoriaDao->listaCategorias();
?>
  <h1>Formulário de cadastro</h1>
    <form action="adiciona-produto.php" method="post">
        <table class="table">

            <?php include("produto-formulario-base.php"); ?>

            <tr>
                <td></td>
                <td><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
            </tr>

        </table>
    </form>
<?php require_once("rodape.php"); ?>