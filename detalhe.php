<?php
    $id = $_GET['id'];
    $id = $explode[1];
?>

<div id="corpo-loja">
	
	<aside class="banner">
		<img src="imagens/banner-meio.png">
	</aside>

    <section class="categorias">
        <h2 class="fundo_azul"> Categorias </h2>
        <nav>
            <ul >

                <?php
                $sql = "SELECT * FROM categoria where ativo_categoria = 's'";
                $total = $categoria->totalRegistros($sql);

                for($i=0;$i<$total;$i++){
                    $categoria->verCategorias($sql,$i);
                    $idCat = $categoria->getId();
                    ?>

                    <li><a href="#"> .:<?php echo $categoria->getCategoria()?></a>
                    <ul>
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
        <?php
        $produto->setId($id);
        $produto->mostrarDados();
        ?>
    </section>
	<div id="lado-direito">
		<section class="vitrine">
			<div id="cx-img-produto">
				<a href="#"><img src="admin/fotos/<?php echo $produto->getImagemProduto()?>"  width="180" height="250" alt=""></a>
			</div>
			<div id="cx-titulo-produto">
				<h1><a href="#"><?php echo $produto->getTituloProduto()?></a></h1>
			</div>
			<div id="cx-preco-produto">
				<span>Valor: </span><strong>R$ <?php echo $produto->getPreco()?></strong>
			</div>
			<div class="duracao-autor">
				<h3><span>Duração:</span><strong><?php echo $produto->getDuracao()?></strong></h3>
			</div>
			<div class="duracao-autor">
				<h4> <span>Autor: </span><strong><?php echo $produto->getAutor()?></strong> </h4>
			</div>
			<div id="descricao-rapida">
				<h2>Descrição rápida</h2>
                <?php echo html_entity_decode("");?>
			</div>
			<div id="comprar-produto">
                <form action="op_carrinho.php" method="post">
                    <input type="hidden" name="txt_valor" value="<?php echo $produto->getPreco()?>"/>
                    <input type="hidden" name="id_produto" value="<?php echo $produto->getId()?>"/>
                    <input type="submit" value="">
				</form>
			</div>
			
			<section id="abas-geral">
				<ul class="menu">
					<li><a href="#aba01"> Descrição </a></li>
					<li><a href="#aba02"> Conteúdo </a></li>
				</ul>
				<section id="box">
					<div id="aba01" class="conteudo">
					<article id="descricao">
						<h5> Descrição </h5>
						<p>
                            <?php echo html_entity_decode($produto->getDescricao())?>
						</p>
					</article>
					</div>
                    <div id="aba02" class="conteudo">
                        <article id="descricao">
                            <h5> Conteudo </h5>
                            <p>
                                <?php echo html_entity_decode('aqui vai o conteudo')?>
                            </p>
                        </article>
                    </div>
				</section>
			</section>
            <div id="sugestao">
                <h3 class="titulo fundo_azul">Sugestões de Compra</h3>

                <ul>
                    <?php
                    $sql_produtos = "SELECT * FROM produto where id_categoria =".$produto->getIdCategoria();
                    $total_produto = $produto->totalRegistros($sql_produtos);

                    for($j=0;$j<$total_produto;$j++){
                        $produto->verProdutos($sql_produtos,$j);

                        ?>
                        <li>
                            <a href="index.php?link=2&id=<?php echo $produto->getId()?>">
                                <figure>
                                    <img src="admin/fotos/<?php echo $produto->getImagemProduto()?>"  width="80" height="90" alt="Curso de Firebird">
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
                    <?php }?>

                </ul>

            </div>
		</section>

	</div>
</div>