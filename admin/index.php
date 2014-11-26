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
    <div id="cabecalho">
        <?php include_once("cabecalho.php"); ?>
    </div><!-- fim cabeçalho -->
    <div id="corpo">
        <nav id="esquerdo">

            <?php include_once("menu.php")?>

        </nav>
        <nav id="direito">

            <?php

            $link = "";
            if(isset($_GET['link']))
                $link = $_GET['link'];

            $page[1] = "home.php";
            $page[2] = "lst/lst_categoria.php";
            $page[3] = "frm/frm_categoria.php";
            $page[4] = "lst/lst_banner.php";
            $page[5] = "frm/frm_banner.php";
            $page[6] = "lst/lst_produto.php";
            $page[7] = "frm/frm_produto.php";

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



        </nav>

    </div>

</body>
</html>
		