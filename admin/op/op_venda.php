<?php
    include_once "../classes/ManipulacaoDeDados.class.php";
    include_once "../biblio.php";

    $acao = $_POST['acao'];
    $id_venda = $_POST['id_venda'];

    $cat = new manipulacaoDeDados();
    $cat->setTabela("venda");

    $txt_data_venda          = $_POST['txt_data_venda'];
    $txt_pago                = $_POST['txt_pago'];
    $txt_codigo_rastreamento = $_POST['txt_codigo_rastreamento'];
    $txt_status              = $_POST['txt_status'];


    if($acao=='Alterar_venda'){

        $cat->setCampos("   data_venda          = '$txt_data_venda' ,
                            pago                = '$txt_pago ' ,
                            codigo_rastreamento = '$txt_codigo_rastreamento' ,
                            status_venda        = '$txt_status '");

        $cat->setValorNaTabela("id_venda");
        $cat->setValorPesquisa($id_venda);

        $cat->alterar();

        echo "<script> location.href='../index.php?link=8';</script>" ;

    }

if($acao=='Excluir'){

    $cat->setValorNaTabela("id_venda");
    $cat->setValorPesquisa($id_venda);

    $cat->remover();

    echo "<script> location.href='../index.php?link=8';</script>" ;

}