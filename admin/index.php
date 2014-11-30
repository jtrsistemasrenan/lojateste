<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> curso de loja virtual</title>
    <link href="css/css.css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="js/abas.js"></script>
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: "textarea#elm1",
            theme: "modern",

            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            content_css: "css/content.css",
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ]
        });
    </script>

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
            $page[8] = "lst/lst_pedidos.php";
            $page[9] = "frm/frm_venda.php";


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
		