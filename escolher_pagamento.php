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
                    <td colspan="5"> <?php if(isset($total_produto)){echo 'Total: '.$total_produto;}?></td>
                </tr>

                </tbody>


            </table>

        <h4 class="fundo_azul">Opção 01 - Depósito / transferência</h4>
        <div id="container-logar">
            <div id="container-bancos-geral">
                <div id="container-banco">
                    <img src="imagens/bb.png">
                  <p>  Banco do Brasil<br/>
                    Agencia: 1613-6 <br/>
                    Conta: 1651-2 <br/>
                    Teste de Conta <br/></p>

                </div>
                <div id="container-banco">
                    <img src="imagens/bradesco.png">
                    <p> Banco Bradesco<br/>
                        Agencia: 1613-6 <br/>
                        Conta: 1651-2 <br/>
                        Teste de Conta <br/></p>

                </div>
                <div id="container-banco">
                    <img src="imagens/itau.png">
                    <p>  Banco Itaú<br/>
                        Agencia: 1613-6 <br/>
                        Conta: 1651-2 <br/>
                        Teste de Conta <br/></p>

                </div>
                <div id="container-banco">
                    <img src="imagens/caixa.png">
                    <p>  Caixa Economica Federal<br/>
                        Agencia: 1613-6 <br/>
                        Conta: 1651-2 <br/>
                        Teste de Conta <br/></p>

                </div>

            </div>

        </div>


    </div>
    </div>

</div>