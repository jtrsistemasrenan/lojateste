<?php
    $txt_data1 = "";
    $txt_data2 = "";
    $txt_cliente = "";

    if(isset($_POST['txt_data1'])&& isset($_POST['txt_data2'])&& isset($_POST['txt_cliente'])){
        $txt_data1   = $_POST['txt_data1'];
        $txt_data2   = $_POST['txt_data2'];
        $txt_cliente = $_POST['txt_cliente'];
    }

        if($txt_data1!=""&& $txt_data2!=""&& $txt_cliente!=""){
            $sql = "SELECT c.cliente , v.* FROM cliente c , venda v WHERE data_venda BETWEEN '$txt_data1' AND '$txt_data2' AND c.cliente like '%$txt_cliente%' AND c.id_cliente = v.id_cliente  ORDER BY data_venda DESC ";
        }else if($txt_data1!=""&& $txt_data2!=""){
            $sql = "SELECT c.cliente , v.* FROM cliente c , venda v WHERE data_venda BETWEEN '$txt_data1' AND '$txt_data2' AND c.id_cliente = v.id_cliente ORDER BY data_venda DESC";

        }else if($txt_cliente!=""){
            $sql = "SELECT c.cliente , v.* FROM cliente c , venda v WHERE c.cliente like '%$txt_cliente%' AND c.id_cliente = v.id_cliente ORDER BY data_venda DESC";

        }else{
            $sql = "SELECT * FROM venda ORDER BY data_venda DESC";
        }

?>

<div id="form_pesquisa">

    <h2> Selecione a Pesquisa </h2>
    <form action="index.php?link=8" method="post" enctype="multipart/form-data">

        <div class="tres-campos">
            <label>
                <span class = "titulo">Data Inicial</span>
                <input type="date" name="txt_data1" id="txt_data1" value="<?php echo $txt_data1;?>" />
            </label>

            <label>
                <span class = "titulo">Data Final</span>
                <input type="date" name="txt_data2" id="txt_data2" value="<?php echo $txt_data2; ?>"/>
            </label>

            <label>
                <span class = "titulo">Cliente</span>
                <input type="text" name="txt_cliente" id="txt_cliente" value="<?php echo $txt_cliente?>" />
            </label>
            <label>
                <input type="hidden" name="acao" value="<?php if($acao!=''){echo $acao;}else{echo 'Inserir';}?>" />
                <input type="hidden" name="id" value="<?php echo $id; ?>" />

                <input type="submit" value="Pesquisar" class="botao" />
            </label>
        </div>
    </form>


</div>

<div>

    <?php

    include_once("./classes/DadosDoBanco.php");
    include_once("./biblio.php");

    $venda = new DadosVenda();
    $itens = new DadosItensVenda();
    $cliente = new DadosCliente();


    $total = $venda->totalRegistros($sql);

    $total_produto = 0;

    for($i=0;$i<$total;$i++){
        $venda->verVenda($sql,$i);
        $idVenda = $venda->getId();
        $cliente->setId($venda->getIdCliente());
        $cliente->mostrarDados();
        $nome_cliente = $cliente->getCliente();


        ?>

        <div id="lista_venda">
            <strong>Num compra: </strong><span><?php echo $venda->getId()?></span>
            <strong>Data compra: </strong><span><?php echo databr($venda->getDataVenda(),2)?></span>
            <strong>Cód Rastreio: </strong><span><?php echo $venda->getCodigoRastreamento()?></span>
            <strong>Status: </strong><span><?php echo $venda->getStatusVenda()."<br/>"?></span>
            <strong>Total: </strong><span><?php echo 'R$'. number_format($itens->somaVendas($idVenda),2,',','.');?></span>
            <strong>Cliente: </strong><span><?php echo $nome_cliente;?></span>

            <span class="opcoes"><a href='index.php?link=9&acao=Excluir&id_venda=<?php echo $idVenda?>'><img src='imagens/excluir.gif'border='0'> </a> </span>
            <span class="opcoes"><a href='index.php?link=9&acao=Alterar_venda&id_venda=<?php echo $idVenda?>'><img src='imagens/alterar.gif' border='0'> </a> </span>

        </div>

        <!--Itens da Venda-->

        <div id="meus-pedidos">



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
                $sql_prod = "select i.* , p.* from itens_venda i , produto p
                            WHERE i.id_produto = p.id_produto and id_venda = $idVenda";

                $totalReg = $itens->totalRegistros($sql_prod);
                $valorTotal =0;

                for($j=0;$j<$totalReg;$j++){
                    $itens->verItens($sql_prod,$j);
                    $subTotal = $itens->getPreco() * $itens->getQtde();
                    $codProd [$j]= $itens->getIdProduto();
                    ?>

                    <tr>

                        <td>
                            <img src="fotos/<?php echo $itens->getImagemProduto()?>"  width="40" height="60">
                            <strong><?php echo $itens->getTituloProduto()?></strong>
                        </td>
                        <td><?php echo $itens->getQtde()?> </td>
                        <td><?php echo 'R$ '. number_format($itens->getPreco()*1,2,',','.'); ?> </td>
                        <td> <?php echo 'R$ '. number_format($subTotal,2,',','.');?></td>
                        <?php $total_produto+=$subTotal?>

                    </tr>

                <?php } ?>

                </tbody>


            </table>
        </div>

    <?php }?>

</div>