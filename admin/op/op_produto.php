<?php
include_once("../classes/ManipulacaoDeDados.class.php");
include_once("../biblio.php");
header('Content-Type: text/html; charset=utf-8');

$acao = $_POST["acao"];
$id = $_POST["id"];


$cad = new manipulacaoDeDados();
$cad->setTabela("produto");

$txt_categoria          = $_POST['txt_categoria'];
$txt_titulo             = $_POST['txt_titulo'];
$txt_preco              = $_POST['txt_preco'];
$txt_autor              = $_POST['txt_autor'];
$txt_duracao            = $_POST['txt_duracao'];
$txt_descricao          = $_POST['txt_descricao'];
$txt_conteudo           = $_POST['txt_conteudo'];

// a funcao gen_slug gera o slug apartir de uma string que no caso é o titulo do produto
$txt_slug_produto       = gen_slug($txt_titulo);
$txt_ativo              = $_POST['txt_ativo'];
$txt_nomeimagem         = $_POST['nome_imagem'];



//$imagem = $_FILES["img"];
$txt_nomeimagem = $_POST["nome_imagem"];


/***************************UPLOAD************************/
    $ext_validas = array(".gif",".jpg",".jpeg",".png");
    $caminho_absoluto = "../fotos/";

    $nome_arquivo = $_FILES['img']['name'];
    $arquivo_temporario = $_FILES['img']['tmp_name'];

    //pega a primeira ocorrencia após o ponto no caso a extencao
    $ext = strchr($nome_arquivo,".");

    if(!in_array($ext,$ext_validas)){

        echo("Este Arquivo com esta extenção não é válida!");
    }

        $nome_arquivo =md5(uniqid(rand(),true)).$ext;

    if($nome_arquivo!=""){
        if(move_uploaded_file($arquivo_temporario,$caminho_absoluto."".$nome_arquivo)){
            //md5 é para gerar um numero aleatorio para ser o nome da imagem para não se repetir
            $txt_nomeimagem = $nome_arquivo;

        }else{
            if($acao!="Excluir"&&$acao!="Alterar")
            die ("Erro no envio do arquivo!");
        }
    }


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
    //remove a imagem da pasta fotos
    unlink('../fotos/' . $txt_nomeimagem);
    $cad->remover();

    echo "<script type='text/javascript'> location.href='../index.php?link=6' </script> ";
}

?>
