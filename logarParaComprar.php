<?php
    $irpara = "";
    if(isset($_GET['irpara'])){
        $irpara = $_GET['irpara'];
    }
?>

<div id="base-carrinho">

    <h2> <img src="imagens/barra-carrinho02.png"></h2>
    <h3> <img src="imagens/identificacao.png"></h3>
    <h4 class="fundo_azul"> Faça o seu Login ou Cadastre-se </h4>
    <div id="container-logar">
        <div id="carrinho-logar">
        <h2> Já sou Cliente</h2>
            <div id="formulario-login">
                <form id="frmlogin " name="frmlogin" method="post" action="logar.php">

                    <fildset>
                        <label>
                            <span>Digite seu Email</span>
                            <input type="text" name="txt_email" id="txt_email">
                        </label>
                        <label>
                            <span>Digite sua Senha</span>
                            <input type="password" name="txt_senha" id="txt_senha">
                        </label>
                        <input type="hidden" name="irpara" value="<?php echo $irpara?>">
                        <input type="submit" name="logar" id="logar" value="logar" class="botao fundo_azul">

                    </fildset>

                </form>

            </div>
        </div>
             <div id="carrinho-logar">
                 <h2>Ainda não sou cadastrado</h2>
                 <p>Caso ainda não seja cadastrado no site, clique no botão abaixo e faça seu cadastro para poder finhalizar a compra</p>
                 <h5><a href="#"><img src="imagens/criar-novo.png"></a></h5>
            </div>
    </div>


</div>