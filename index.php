<?php
include_once("admin/classes/DadosDoBanco.php");
$categoria = new DadosCategoria();
$produto = new DadosProduto();
$carrinho = new DadosCarrinho();
$cliente = new DadosCliente();

//testando o git

    session_start();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> curso de loja virtual</title>
<link href="css/style.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="js/abas.js"></script>

</head>
<body>
	<div id="Principal">
		<section id="cabecalho">
			<?php include_once("cabecalho.php"); ?>
		</section><!-- fim cabeçalho -->
		
		<section id="corpo">
            <?php

            $link = "";
            if(isset($_GET['link']))
                $link = $_GET['link'];

            $page[1] = "home.php";
            $page[2] = "detalhe.php";
            $page[3] = "carrinho.php";
            $page[4] = "frm_cliente.php";
            $page[5] = "logarParaComprar.php";


            if(!empty($link)){
                if(file_exists($page[$link])){

                    include $page[$link];

                }else{
                    include ("home.php");
                }


            }else{
                include ("home.php");
            }

            ?>
		</section><!-- fim corpo -->
		
		<footer id="rodape">
			<?php include_once("rodape.php"); ?>
		</footer><!-- fim rodape -->
	
	
	</div> <!-- fim principal -->
</body>
</html>
