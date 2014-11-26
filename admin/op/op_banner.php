<?php
	include_once("../classes/ManipulacaoDeDados.class.php");
	include_once("../biblio.php");
	
	$acao = $_POST["acao"];
	$id	  = $_POST["id"];

	
	$cad = new manipulacaoDeDados();
	$cad->setTabela("banner");
	

	$txt_titulo = $_POST["txt_titulo"];
	$txt_alt 	= $_POST["txt_alt"];
	$txt_url 	= $_POST["txt_url"];
	$txt_ativo 	= $_POST["txt_ativo"];
	
	$imagem		= $_FILES["img"];
	$txt_nomeimagem = $_POST["nome_imagem"];
	
	
		/***************************UPLOAD************************/


	if($imagem['name']!=""){	
		
		$pasta = '../banner';
		$permitido = array('image/jpg','image/jpeg','image/pjpeg');				
		
		$tmp =  $imagem['tmp_name'];
		$name = $imagem['name'];
		$type = $imagem['type'];	
		
		$txt_nomeimagem = 'bn-'.md5(uniqid(rand(), true)).'.jpg';
		
		if(!empty($name) && in_array($type, $permitido)){				
			
			upload_jpg($tmp, $txt_nomeimagem, 940, $pasta);						
		}elseif($type=='image/png'){			
			upload_png($tmp, $txt_nomeimagem, 940, $pasta);
			
		}elseif($type=='image/gif'){			
			upload_gif($tmp, $txt_nomeimagem, 940, $pasta);	
		}
	};	
	/***************************UPLOAD************************/
	
	
	if($acao=="Inserir"){
		$cad ->setCampos("titulo_banner, alt, url_banner,ativo_banner,imagem_banner");
		$cad ->setDados(" '$txt_titulo', '$txt_alt', '$txt_url', '$txt_ativo','$txt_nomeimagem'");
		$cad-> inserir();
		
		echo "<script type='text/javascript'> location.href='../index.php?link=4' </script> ";
	}
	
	if($acao=="Alterar"){
		$cad ->setCampos("	titulo_banner 	='$txt_titulo', 
							alt				='$txt_alt', 
							url_banner 		='$txt_url',
							ativo_banner 	='$txt_ativo',
							imagem_banner 	='$txt_nomeimagem' ");
		$cad->setValorNaTabela("id_banner");
		$cad->setValorPesquisa("$id");
		$cad->alterar();
		
		echo "<script type='text/javascript'> location.href='../index.php?link=4' </script> ";
	}
	
	if($acao=="Excluir"){
		
		$cad->setValorNaTabela("id_banner");
		$cad->setValorPesquisa("$id");
        //remove a imagem da pasta banner
        unlink('../banner/'.$txt_nomeimagem);
		$cad->remover();
		
		echo "<script type='text/javascript'> location.href='../index.php?link=4' </script> ";
	}

?>
