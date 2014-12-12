<?php
include_once("admin/classes/DadosDoBanco.php");
include_once("admin/biblio.php");
$categoria = new DadosCategoria();
$produto = new DadosProduto();
$carrinho = new DadosCarrinho();
$cliente = new DadosCliente();
$venda = new DadosVenda();
$itens = new DadosItensVenda();

header('Content-Type: text/html; charset=utf-8');

//se a sessao nao estiver sido inicializada entao inicializar
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> curso de loja virtual</title>
<link href="css/style.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="js/abas.js"></script>


    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#accordion-1" ).accordion();
        });
    </script>
    <style>
        #accordion-1{font-size: 14px;}
    </style>


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
            $page[6] = "escolher_pagamento.php";
            $page[7] = "finaliza.php";
            $page[8] = "finaliza_deposito_transferencia.php";
            $page[9] = "logoff.php";
            $page[10] = "minha_conta.php";
            $page[11] = "busca.php";
            $page[13] = "pagseguro.php";


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
