<?php

include_once ("admin/classes/ManipulacaoDeDados.class.php");
include_once ("admin/classes/DadosDoBanco.php");
$cad = new ManipulacaoDeDados();
$carrinho = new DadosCarrinho();

    session_start();

    echo 'Sessao = '.$_SESSION["id_pedido_curso"];

    $acao = $_POST['acao'];
    //pega o post do form do home.php
    $id_produto = $_POST['id_produto'];
    $txt_valor = $_POST['txt_valor'];


    //Veridica se ja existe uma sessao do pedido
    if($_SESSION["id_pedido_curso"]=="" || $_SESSION["id_pedido_curso"]==0){

        $data = date("Y-m-d");

       if($_SESSION[cliente_curso][ID]!=""){
            $id_cliente = $_SESSION[cliente_curso][id];

        }else{

            $id_cliente = "0";
        }

        $cad->setTabela("pedido");
        $cad->setCampos("id_cliente,data_pedido");
        $cad->setDados("'$id_cliente','$data'");
        $cad->inserir();

        //pega o ultimo codigo gerado

        $ultimoCodigo = $cad->ultimoRegistro("id_pedido","pedido");

        if($ultimoCodigo!=0 && $ultimoCodigo!=""){
            $_SESSION["id_pedido_curso"]=$ultimoCodigo;
        }else{
            //chama mensagem de erro;
        }


    }
    //cria a sessao do pedido para que seja adicionados produtos no carrinho com o msm numero de pedido
    $id_pedido = $_SESSION["id_pedido_curso"];
    $cad->setTabela("carrinho");

    if($acao !="ALTERAR") {

        //Faz um select para verificar no carrinho existe um pedido do mesmo produto se houver então ao invez de
        //cadastrar um novo produto no carrinho so alterar a quantidade
        $sql = "SELECT * FROM carrinho WHERE id_produto = '$id_produto' and id_pedido = '$id_pedido'";
        $totalReg = $carrinho->totalRegistros($sql);


        //se o total de registro for maior do que 0 então altere a quantidade se nao cadastre o produto no carrinho
        if ($totalReg > 0) {
            $cad->setValorNaTabela("id_pedido");
            $cad->setValorPesquisa("$id_pedido and id_produto = $id_produto");
            $cad->setCampos("qtde = qtde + 1");
            $cad->setDados("'$id_pedido','$id_produto','$txt_valor','1'");
            $cad->alterar();


        } else {
            $cad->setCampos("id_pedido,id_produto,valor, qtde");
            $cad->setDados("'$id_pedido','$id_produto','$txt_valor','1'");
            $cad->inserir();
        }


    }

    if($acao =="ALTERAR"){

        $v_atualiza = $_POST['codprod'];

        $chaves = array_keys($v_atualiza);

        for($i=0;$i<sizeof($chaves);$i++) {
                $indice = $chaves[$i];
                $txt_qtde = $v_atualiza[$indice]['QTDE'];
                $id_produto = $v_atualiza[$indice]['IDPRODUTO'];

                $cad->setValorNaTabela("id_pedido");
                $cad->setValorPesquisa("$id_pedido and id_produto = $id_produto");

            if($v_atualiza[$indice]['QTDE']>0) {
                echo 'Altera id_produto = '.$id_produto.' txt_qtde = '.$txt_qtde."</br>";
                $cad->setCampos("qtde = '$txt_qtde'");
                $cad->alterar();
            }else{
                $cad->remover();
                echo 'Remove id_produto = '.$id_produto.' txt_qtde = '.$txt_qtde."</br>";
            }
        }

    }

echo "<script> location.href='index.php?link=3'</script>";
















