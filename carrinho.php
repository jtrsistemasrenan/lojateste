<?php

//se a sessao nao estiver sido inicializada entao inicializar
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    $id_pedido =0;
    $total_produto=0;
    //caso a $_SESSION["id_pedido_curso"] esteja vazia entao id_pedido = a 0 para nao dar erro na busca
    if(isset($_SESSION["id_pedido_curso"])) {
        $id_pedido = $_SESSION["id_pedido_curso"];
    }

    if($id_pedido!=0 && $id_pedido !='') {

        ?>

        <div id="base-carrinho">
            <h2><img src="imagens/barra-carrinho01.png"></h2>

            <h3><img src="imagens/meu-carrinho.png"></h3>

            <div class="dados-carrinho">
                <span> Para excluir coloque a quantidade zero e clique em atualizar!</span>

                <form name="frm_carrinho" action="op_carrinho.php" method="post">
                    <table cellpadding="0" cellspacing="0" border="1">

                        <thead>
                        <tr>

                            <th>Descrição do Produto</th>
                            <th>Quantidade</th>
                            <th>Preço unitário</th>
                            <th>Subtotal</th>
                            <th>Atualizar</th>
                        </tr>

                        </thead>

                        <tbody>

                        <?php
                        $sql = $sql = "select c.* , p.* from carrinho c , produto p WHERE c.id_produto = p.id_produto and id_pedido = $id_pedido";
                        $totalReg = $carrinho->totalRegistros($sql);
                        $valorTotal = 0;

                        for ($i = 0; $i < $totalReg; $i++) {
                            $carrinho->verCarrinho($sql, $i);
                            $subTotal = $carrinho->getPreco() * $carrinho->getQtde();
                            $codProd [$i] = $carrinho->getIdProduto();


                            ?>

                            <tr>

                                <td>
                                    <img src="admin/fotos/<?php echo $carrinho->getImagemProduto() ?>"  width="80" height="90">
                                    <strong><?php echo $carrinho->getTituloProduto() ?></strong>
                                </td>
                                <td><input type="number" name="codprod[<?php echo $i ?>][QTDE]"
                                           value=<?php echo $carrinho->getQtde() ?> "size="3" maxlength="3" min="0"
                                    max="100" step="1">
                                </td>
                                <td><?php echo 'R$ '. number_format($carrinho->getPreco()*1,2,',','.') ?> </td>
                                <td> <?php echo 'R$ '. number_format($subTotal,2,',','.') ?></td>

                                <td>
                                    <input type="hidden" name="codprod[<?php echo $i ?>][IDPRODUTO]"
                                           value="<?php echo $carrinho->getIdProduto() ?>">
                                    <input type="hidden" name="acao" value="ALTERAR">
                                    <input type="submit" name="alterar" value="Atualizar"></td>
                                <?php $total_produto += $subTotal ?>

                            </tr>

                        <?php } ?>
                        <tr>
                            <td colspan="5"> <?php if (isset($total_produto)) {
                                    echo 'Total =' .'R$ '. number_format($total_produto,2,',','.');
                                } ?></td>
                        </tr>

                        </tbody>


                    </table>
                </form>

            </div>

            <div id="linha">
                <!-- caso clique em cfinalizar-compra o link será o 7 que levará para pagina de finaliza que irá decidir
                     dependendo do usuário está logado ou não para onde o usuário será direcionado-->
                <a href="index.php?link=7"><img src="imagens/finalizar-compra.png"></a><a href="index.php"><img
                        src="imagens/continuar-comprando.png"></a>

            </div>
            <div class="vitrine">
                <div id="sugestao">
                    <h3 class="titulo fundo_azul">Sugestões de Compra</h3>

                    <ul>
                        <?php
                        $id_categoria = $carrinho->getIdCategoria();
                        $sql_produtos = "SELECT * FROM produto where id_categoria = $id_categoria";
                        $total_produto = $produto->totalRegistros($sql_produtos);

                        for ($j = 0; $j < $total_produto; $j++) {
                            $produto->verProdutos($sql_produtos, $j);

                            ?>
                            <li>
                                <a href="index.php?link=2&id=<?php echo $produto->getId() ?>">
                                    <figure>
                                        <img src="admin/fotos/<?php echo $produto->getImagemProduto() ?>"  width="80" height="90"
                                             alt="Curso de Firebird">
                                        <figcaption> <?php echo $produto->getTituloProduto() ?> </figcaption>
                                    </figure>
                                    <span> <?php echo 'R$ '. number_format($produto->getPreco()*1,2,',','.'); ?> </span>

                                    <form action="op_carrinho.php" method="post">
                                        <input type="hidden" name="txt_valor"
                                               value="<?php echo $produto->getPreco(); ?>"/>
                                        <input type="hidden" name="id_produto" value="<?php echo $produto->getId() ?>"/>
                                        <input type="submit" value="">
                                    </form>
                                </a>
                            </li>
                        <?php } ?>

                    </ul>

                </div>
                </section>
            </div>

        </div>
    <?php
    }else{
        echo "<p>Não existe nenhum item no seu carrinho</p>";
    }
        ?>