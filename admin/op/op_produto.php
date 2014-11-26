<?php
include_once("../classes/ManipulacaoDeDados.class.php");
include_once("../biblio.php");

$acao = $_POST["acao"];
$id = $_POST["id"];


$cad = new manipulacaoDeDados();
$cad->setTabela("produto");

$txt_categoria = $_POST['txt_categoria'];
$txt_titulo = $_POST['txt_titulo'];
$txt_preco = $_POST['txt_preco'];
$txt_autor = $_POST['txt_autor'];
$txt_duracao = $_POST['txt_duracao'];
$txt_descricao = $_POST['txt_descricao'];
$txt_conteudo = $_POST['txt_conteudo'];
$txt_slug_produto = "";
$txt_ativo = $_POST['txt_ativo'];
$txt_nomeimagem = $_POST['nome_imagem'];


$imagem = $_FILES["img"];
$txt_nomeimagem = $_POST["nome_imagem"];


/***************************UPLOAD************************/


if ($imagem['name'] != "") {

    $pasta = '../fotos';
    $permitido = array('image/jpg', 'image/jpeg', 'image/pjpeg');

    $tmp = $imagem['tmp_name'];
    $name = $imagem['name'];
    $type = $imagem['type'];

    $txt_nomeimagem = 'bn-' . md5(uniqid(rand(), true)) . '.jpg';

    if (!empty($name) && in_array($type, $permitido)) {

        upload_jpg($tmp, $txt_nomeimagem, 139, $pasta);
    } elseif ($type == 'image/png') {
        upload_png($tmp, $txt_nomeimagem, 139, $pasta);

    } elseif ($type == 'image/gif') {
        upload_gif($tmp, $txt_nomeimagem, 139, $pasta);
    }
};
/***************************UPLOAD************************/


if ($acao == "Inserir") {
    $cad->setCampos("id_categoria, titulo_produto, preco,
        autor, duracao,descricao,conteudo,slug_produto,ativo_produto,imagem_produto");
    $cad->setDados("
		                    '$txt_categoria','$txt_titulo' ,  '$txt_preco' , '$txt_autor' ,'$txt_duracao' ,
		                    '$txt_descricao' ,'$txt_conteudo' ,'$txt_slug_produto' , '$txt_ativo' , '$txt_nomeimagem' ");
    $cad->inserir();
    echo "<script type='text/javascript'> location.href='../index.php?link=6' </script> ";

}
    if ($acao == "Alterar"){
        $cad->setCampos("
                            id_categoria         = '$txt_categoria',
                            titulo_produto       = '$txt_titulo' ,
                            preco                = '$txt_preco' ,
                            autor                = '$txt_autor' ,
                            duracao              = '$txt_duracao' ,
                            descricao            = '$txt_descricao' ,
                            conteudo             = '$txt_conteudo' ,
                            slug_produto         = '$txt_slug_produto' ,
                            ativo_produto        = '$txt_ativo' ,
                            imagem_produto       = '$txt_nomeimagem' ");

    $cad->setValorNaTabela("id_produto");
    $cad->setValorPesquisa("$id");
    $cad->alterar();

    echo "<script type='text/javascript'> location.href='../index.php?link=6' </script> ";
}

if ($acao == "Excluir") {

    $cad->setValorNaTabela("id_produto");
    $cad->setValorPesquisa("$id");
    //remove a imagem da pasta banner
    unlink('../banner/' . $txt_nomeimagem);
    $cad->remover();

    echo "<script type='text/javascript'> location.href='../index.php?link=6' </script> ";
}

?>
