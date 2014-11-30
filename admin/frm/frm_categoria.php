<?php

    $acao = "";
    $id = "";
    if(isset($_GET['acao']))
    $acao = $_GET['acao'];
    if(isset($_GET['id']))
    $id = $_GET['id'];

    $txt_titulo = "";
    $txt_ordem = "";
    $txt_ativo = "";

    if($acao!=""){
        include_once "./classes/DadosDoBanco.php";
        $dados = new DadosCategoria();
        $dados->setId($id);
        $dados->mostrarDados();

        $txt_titulo = $dados->getCategoria();
        $txt_ordem = $dados->getOrdemmCategoria();
        $txt_ativo = $dados->getAtivoCategoria();
    }

?>

<div id="formulario">

    <h2> Cadastro de alguma coisa </h2>
    <form action="./op/op_categoria.php" method="post" enctype="multipart/form-data">
        <label>
            <span class = "titulo">Titulo da Categoria</span>
            <input type="text" name="txt_titulo" id="txt_titulo" value="<?php echo $txt_titulo; ?>"/>
        </label>

        <div class="dois-campos">
            <label>
                <span class = "titulo">Ordem</span>
                <input type="text" name="txt_ordem" id="txt_ordem" value="<?php echo $txt_ordem; ?>"/>
            </label>
            <label>
                <span class = "titulo">Ativo</span>
               <select name="txt_ativo" id="txt_ativo">
                   <option value ='s' <?php if($txt_ativo=='s') echo 'selected';?>>SIM</option>
                   <option value ='n' <?php if($txt_ativo=='n') echo 'selected';?>>NÃO</option>
               </select>
            </label>
        </div>

        <input type="hidden" name="acao" value="<?php if($acao!=''){echo $acao;}else{echo 'Inserir';}?>" />
        <input type="hidden" name="id" value="<?php echo $id; ?>" />

        <input type="submit" value="<?php if($acao!=''){echo $acao;}else{echo 'Inserir';}?>" class="botao" />

    </form>


</div>