<?php

//se a sessao nao estiver sido inicializada entao inicializar
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

    include_once ("admin/classes/ManipulacaoDeDados.class.php");
    include_once ("admin/classes/DadosDoBanco.php");
    $cad = new ManipulacaoDeDados();
    $carrinho = new DadosCarrinho();

    $id_pedido = $_SESSION['id_pedido_curso'];
    $id_cliente = $_SESSION['cliente_curso']['ID'];

    $data = date('Y-m-d');

    //inserir a informação para a tabela de venda

    $cad->setTabela('venda');
    $cad->setCampos('id_cliente,data_venda,pago,status_venda');
    $cad->setDados("'$id_cliente','$data','N','Venda iniciada'");
    $cad->inserir();

    $ultimoCodigo = $cad->ultimoRegistro("id_venda","venda");

    $sql= $sql = "select c.* , p.* from carrinho c , produto p WHERE c.id_produto = p.id_produto and id_pedido = $id_pedido";
    $totalReg = $carrinho->totalRegistros($sql);
    $valorTotal =0;

    for($i=0;$i<$totalReg;$i++) {
        $carrinho->verCarrinho($sql, $i);

        $id_produto = $carrinho->getId();
        $valor = $carrinho->getValor();
        $qtde = $carrinho->getQtde();

        $cad->setTabela('itens_venda');
        $cad->setCampos('id_venda,id_produto,valor_item,qtde');
        $cad->setDados("'$ultimoCodigo','$id_produto',$valor,$qtde");
        $cad->inserir();

    }

    mysql_query("delete from carrinho WHERE id_pedido = $id_pedido");
    mysql_query("delete from pedido WHERE id_pedido = $id_pedido");
    unset($_SESSION['id_pedido_curso']);

    /*Falta deixar algum registro da venda para futuros relatórios nas video aulas nao tem*/

?>