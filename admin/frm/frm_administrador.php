<?php
$acao = isset($_GET["acao"])? $_GET["acao"]:"";
$id	  = isset($_GET["id"])? $_GET["id"]:"";

$txt_nome 	= "";
$txt_email 	="";
$txt_login 	="";
$txt_senha 	="";

if($acao !="" ){

    include_once("./classes/DadosDoBanco.php");
    $dados = new DadosAdministrador();
    $dados->setId($id);
    $dados->mostrarDados();

    $txt_nome 	= $dados-> getNome();
    $txt_email 	= $dados-> getEmail();
    $txt_login 	= $dados-> getLogin();
    $txt_senha 	= $dados-> getSenha();

}

?>

<div id="formulario">
    <h2> Cadastro de Administradores </h2>
    <form action="./op/op_administrador.php" method="post" enctype="multipart/form-data">
        <label>
            <span class="titulo">Nome do Administrador </span>
            <input type="text" name="txt_nome" id="txt_nome" value="<?php echo $txt_nome ?>">
        </label>

        <div class="tres-campos">
            <label>
                <span class="titulo">Email </span>
                <input type="text" name="txt_email" id="txt_email" value="<?php echo $txt_email ?>">
            </label>
            <label>
                <span class="titulo">Login </span>
                <input type="text" name="txt_login" id="txt_login" value="<?php echo $txt_login ?>">
            </label>
            <label>
                <span class="titulo">Senha </span>
                <input type="password" name="txt_senha" id="txt_senha" value="<?php echo $txt_senha ?>">
            </label>
        </div>

        <input type="hidden" name="id" value="<?php  echo $id; ?>" />
        <input type="hidden" name="acao" value="<?php if ($acao!=""){ echo $acao;}else{echo "Inserir";} ?>" />
        <input type="submit" value="<?php if ($acao!=""){ echo $acao;}else{echo "Inserir";} ?>" class="botao" />


    </form>


</div>