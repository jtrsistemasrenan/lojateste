<?php
    include_once "admin/biblio.php";
?>

<div id="corpo-loja">

    <aside class="banner">
        <img src="imagens/banner-meio.png">
    </aside>

    <section class="categorias">
        <h2 class="fundo_azul"> Categorias </h2>
        <nav>
            <ul>

                <?php
                $sql = "SELECT * FROM categoria where ativo_categoria = 's'";
                $total = $categoria->totalRegistros($sql);

                for($i=0;$i<$total;$i++){
                    $categoria->verCategorias($sql,$i);
                    $idCat = $categoria->getId();
                    ?>

                    <li><a href="#"> .:<?php echo $categoria->getCategoria()?></a>
                    <ul >
                        <?php
                        $sql_produtos = "SELECT * FROM produto where id_categoria =$idCat";
                        $total_produto = $produto->totalRegistros($sql_produtos);

                        for($j=0;$j<$total_produto;$j++){
                            $produto->verProdutos($sql_produtos,$j);

                            ?>

                            <li><a href="index.php?link=2&id=<?php echo $produto->getId()?>">.:<?php echo $produto->getTituloProduto()?></a></li>

                        <?php }?>
                    </ul>
                        </li>
                <?php }?>
            </ul>
        </nav>
    </section>

    <div id="lado-direito">
        <h3 class="titulo fundo_azul"> Resultado da Pesquisa </h3>
        <section class="vitrine">
                <ul>
                    <?php

                    $pesquisa = '';
                    if(isset($_POST['txt_pesquisa'])){
                        $pesquisa = $_POST['txt_pesquisa'];
                    }
                    $txt_pesquisa = strip_tags($pesquisa);
                    $sql_produtos = "SELECT * FROM produto where titulo_produto like '%".anti_sql_injection($txt_pesquisa)."%'";
                    $total_produto = $produto->totalRegistros($sql_produtos);

                    for($j=0;$j<$total_produto;$j++){
                        $produto->verProdutos($sql_produtos,$j);

                        ?>
                        <li>
                            <a href="index.php?link=2&id=<?php echo $produto->getId()?>">
                                <figure>
                                    <img src="admin/fotos/<?php echo $produto->getImagemProduto()?>" alt="Curso de Firebird">
                                    <figcaption> <?php echo $produto->getTituloProduto()?> </figcaption>
                                </figure>
                                <span> R$ <?php echo $produto->getPreco()?> </span>
                                <form action="op_carrinho.php" method="post">
                                    <input type="hidden" name="txt_valor" value="<?php echo $produto->getPreco()?>"/>
                                    <input type="hidden" name="id_produto" value="<?php echo $produto->getId()?>"/>
                                    <input type="submit" value="">
                                </form>
                            </a>
                        </li>

                </ul>
            <?php }?>
        </section>
    </div>


</div>