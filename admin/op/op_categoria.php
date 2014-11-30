<?php
    include_once "../classes/ManipulacaoDeDados.class.php";
    include_once "../biblio.php";

    $acao = $_POST['acao'];
    $id = $_POST['id'];

    $categoria = new manipulacaoDeDados();
    $categoria->setTabela("categoria");

    $txt_titulo = $_POST["txt_titulo"];
    $txt_ordem = $_POST["txt_ordem"];
    $txt_ativo = $_POST["txt_ativo"];
    $slug_categoria = gen_slug($txt_titulo);

    if($acao=='Inserir'){
    $categoria->setCampos('categoria, slug_categoria,ordem_categoria, ativo_categoria');
    $categoria->setDados("'$txt_titulo','$slug_categoria','$txt_ordem','$txt_ativo'");
    $categoria->inserir();

        echo "<script> location.href='../index.php?link=2';</script>" ;
}
    if($acao=='Alterar'){

        $categoria->setCampos("categoria = '$txt_titulo' , slug_categoria = '$slug_categoria' , ordem_categoria = '$txt_ordem' , ativo_categoria = '$txt_ativo' ");
        $categoria->setValorNaTabela("id_categoria");
        $categoria->setValorPesquisa($id);

        $categoria->alterar();

        echo "<script> location.href='../index.php?link=2';</script>" ;

    }

if($acao=='Excluir'){

    $categoria->setValorNaTabela("id_categoria");
    $categoria->setValorPesquisa($id);

    $categoria->remover();

    echo "<script> location.href='../index.php?link=2';</script>" ;

}