<?php

//se a sessao nao estiver sido inicializada entao inicializar
if(!isset($_SESSION)){
    session_start();
}
//caso a $_SESSION["id_pedido_curso"] esteja vazia entao id_pedido = a 0 para nao dar erro na busca
$id_pedido = $_SESSION["id_pedido_curso"];
if($id_pedido==''){
    $id_pedido=0;
}
?>

<div id="base-carrinho">
    <h2><img src="imagens/barra-carrinho03.png"></h2>
    <h3><img src="imagens/forma-pag.png"></h3>
    <div class="dados-carrinho">


            <table cellpadding="0" cellspacing="0" border="1">

                <thead>
                <tr>

                    <th>Descrição do Produto</th>
                    <th>Quantidade</th>
                    <th>Preço unitário</th>
                    <th>Subtotal </th>

                </tr>

                </thead>

                <tbody>

                <?php
                $sql= $sql = "select c.* , p.* from carrinho c , produto p WHERE c.id_produto = p.id_produto and id_pedido = $id_pedido";
                $totalReg = $carrinho->totalRegistros($sql);
                $valorTotal =0;

                for($i=0;$i<$totalReg;$i++){
                    $carrinho->verCarrinho($sql,$i);
                    $subTotal = $carrinho->getPreco() * $carrinho->getQtde();
                    $codProd [$i]= $carrinho->getIdProduto();
                    ?>

                    <tr>

                        <td>
                            <img src="admin/fotos/<?php echo $carrinho->getImagemProduto()?>">
                            <strong><?php echo $carrinho->getTituloProduto()?></strong>
                        </td>
                        <td><?php echo $carrinho->getQtde()?> </td>
                        <td>R$ <?php echo $carrinho->getPreco() ?> </td>
                        <td> <?php echo $subTotal?></td>
                        <?php $total_produto+=$subTotal?>

                    </tr>

                <?php } ?>
                <tr>
                    <td colspan="5"> <?php if(isset($total_produto)){echo 'Total ='.$total_produto;}?></td>
                </tr>

                </tbody>


            </table>


    </div>

    <div id="linha">

        <img src = "imagens/finalizar-compra.png"><a href="index.php"><img src="imagens/continuar-comprando.png"></a>

    </div>
    <div class="vitrine">
        <div id="sugestao">
            <h3 class="titulo fundo_azul">Sugestões de Compra</h3>

            <ul>
                <?php
                $sql_produtos = "SELECT * FROM produto where id_categoria =1";
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
                <?php }?>

            </ul>

        </div>
        </section>
    </div>

</div>