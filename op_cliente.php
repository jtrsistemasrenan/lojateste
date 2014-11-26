<?php
session_start();
include_once("admin/classes/ManipulacaoDeDados.class.php");
include_once("admin/biblio.php");

$acao = $_POST["acao"];
$id	  = $_POST["id"];


$cad = new manipulacaoDeDados();
$cad->setTabela("cliente");


//strip tags eh para eliminar qualquer tag que usuario digite
//trim é para eliminar os espaços
$txt_cliente	= strip_tags(trim($_POST["txt_cliente"]));
$txt_endereco	= strip_tags(trim($_POST["txt_endereco"]));
$txt_cidade 	= strip_tags(trim($_POST["txt_cidade"]));
$txt_bairro 	= strip_tags(trim($_POST["txt_bairro"]));
$txt_uf  		= strip_tags(trim($_POST["txt_uf"]));
$txt_cep  		= strip_tags(trim($_POST["txt_cep"]));
$txt_email  	= strip_tags(trim($_POST["txt_email"]));
$txt_sexo  		= strip_tags(trim(""));
$txt_fone  		= strip_tags(trim($_POST["txt_fone"]));
$txt_senha		= strip_tags(trim($_POST["txt_senha"]));
$txt_ativo		= strip_tags(trim($_POST["txt_ativo"]));

$txt_complemento= strip_tags(trim($_POST["txt_complemento"]));
$txt_DDD		= strip_tags(trim($_POST["txt_DDD"]));
$txt_numero		= strip_tags(trim($_POST["txt_numero"]));


if($txt_cliente !="" && $txt_email !="") {
//ant_sql_injection é para não permitir qualquer tipo de injeção de sql no codigo digitado pelo usuario
    if($acao=="Inserir"){
        $cad ->setCampos("cliente, endereco, cidade, bairro, uf, cep, email, sexo, fone, senha, ativo_cliente,complemento, ddd, numero");
        $cad ->setDados("
					'".anti_sql_injection($txt_cliente)."', 
					'".anti_sql_injection($txt_endereco)."', 
					'".anti_sql_injection($txt_cidade)."', 
					'".anti_sql_injection($txt_bairro)."',
					'".anti_sql_injection($txt_uf)."', 
					'".anti_sql_injection($txt_cep)."', 
					'".anti_sql_injection($txt_email)."', 
					'".anti_sql_injection($txt_sexo)."' ,
					'".anti_sql_injection($txt_fone)."',
					'".anti_sql_injection($txt_senha)."',
					'".anti_sql_injection($txt_ativo)."',
					'".anti_sql_injection($txt_complemento)."',
					'".anti_sql_injection($txt_DDD)."',
					'".anti_sql_injection($txt_numero)."'
					
					");
        $cad-> inserir();

        echo "<script type='text/javascript'> location.href='index.php' </script> ";
    }

    if($acao=="atualiza_cadastro"){
        $cad ->setCampos("
						cliente     	=   '".anti_sql_injection($txt_cliente)."', 
						endereco    	=   '".anti_sql_injection($txt_endereco)."',
						cidade      	=   '".anti_sql_injection($txt_cidade)."', 
						bairro      	=   '".anti_sql_injection($txt_bairro)."',
						uf          	=   '".anti_sql_injection($txt_uf)."', 
						cep         	=   '".anti_sql_injection($txt_cep)."', 
						sexo        	=   '".anti_sql_injection($txt_sexo)."' ,
						fone        	=   '".anti_sql_injection($txt_fone)."',
						ativo_cliente	=   '".anti_sql_injection($txt_ativo)."',
						complemento     =   '".anti_sql_injection($txt_complemento)."' ,
						ddd        		=   '".anti_sql_injection($txt_DDD)."',
						numero			=   '".anti_sql_injection($txt_numero)."'
		
		
		
		");
        $cad->setValorNaTabela("id_cliente");
        $cad->setValorPesquisa("$id");
        $cad->alterar();
        $_SESSION[cliente_curso][CLIENTE] = $txt_cliente;
        echo "<script type='text/javascript'> location.href='index.php' </script> ";
    }

    if($acao=="Atualizar_login"){
        $cad ->setCampos("
						email       	=   '".anti_sql_injection($txt_email)."',					
						senha       	=   '".anti_sql_injection($txt_senha)."'
		");
        $cad->setValorNaTabela("id_cliente");
        $cad->setValorPesquisa("$id");
        $cad->alterar();

        $_SESSION[cliente_curso][EMAIL] = $txt_email;

        echo "<script type='text/javascript'> location.href='index.php' </script> ";
    }

}
?>