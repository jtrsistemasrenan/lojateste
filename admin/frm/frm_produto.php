<?php

include_once("./classes/DadosDoBanco.php");
$acao = "";
$id = "";
if(isset($_GET['acao']))
    $acao = $_GET['acao'];
if(isset($_GET['id']))
    $id = $_GET['id'];

$txt_titulo             = "";
$txt_preco              = "";
$txt_autor              = "";
$txt_duracao            = "";
$txt_descricao          = "";
$txt_conteudo           = "";
$txt_slug_produto       = "";
$txt_ativo              = "";
$nome_imagem             = "";


if($acao !="" ){


    $dados = new DadosProduto();
    $dados->setId($id);
    $dados->mostrarDados();

    $txt_categoria          = $dados->getIdCategoria();
    $txt_titulo             = $dados->getTituloProduto();
    $txt_preco              = $dados->getPreco();
    $txt_autor              = $dados->getAutor();
    $txt_duracao            = $dados->getDuracao();
    $txt_descricao          = $dados->getDescricao();
    $txt_conteudo           = $dados->getConteudo();
    $txt_slug_produto       = $dados->getSlugProduto();
    $txt_ativo              = $dados->getAtivoProduto();
    $nome_imagem            = $dados->getImagemProduto();

}

?>

<div id="formulario">
    <h2> Cadastro de Produtos </h2>
    <form action="./op/op_produto.php" method="post" enctype="multipart/form-data">

        <label class="imagem">
            <span class="titulo">Selecione uma imagem </span>
            <input type="file" name="img" >
        </label>

        <label>
            <span class="titulo">Título do Produto </span>
            <input type="text" name="txt_titulo" id="txt_titulo" value="<?php echo $txt_titulo ?>">
        </label>
        <label>
            <span class="titulo">Descrição </span>
            <textarea  name="txt_descricao"  cols="74" rows="6" id="elm1"  ><?php echo $txt_descricao ?> </textarea>
        </label>
        <div class="tres-campos">
            <label>
                <span class="titulo">Preço </span>
                <input type="text" name="txt_preco" id="txt_preco" value="<?php echo $txt_preco ?>">
            </label>
            <label>
                <span class="titulo">Duração </span>
                <input type="text" name="txt_duracao" id="txt_duracao" value="<?php echo $txt_duracao ?>">
            </label>
            <label>
                <span class="titulo">Ativo </span>
                <select name="txt_ativo" id="txt_ativo">
                    <option value="S" <?php if($txt_ativo=="S")echo "selected" ?>> Sim </option>
                    <option value="N" <?php if($txt_ativo=="N")echo "selected" ?>> Não </option>

                </select>
            </label>
        </div>

        <label>
            <span class="titulo">Conteudo </span>
            <textarea  name="txt_conteudo" id="txt_conteudo" cols="74" rows="6" ><?php echo $txt_conteudo ?> </textarea>
        </label>

        <label>
            <span class="titulo">Autor </span>
            <input type="text" name="txt_autor" id="txt_autor" value="<?php echo $txt_autor ?>">
        </label>

        <label>
            <span class="titulo">Selecione a Categoria </span>
            <select name="txt_categoria" id="txt_categoria">
                <?php

                $cb = new DadosCategoria();
                $cb->comboCategoria($txt_categoria);

                ?>


            </select>
        </label>

    <br>

        <input type="hidden" name="nome_imagem" value="<?php  echo $nome_imagem; ?>" />
        <input type="hidden" name="id" value="<?php  echo $id; ?>" />
        <input type="hidden" name="acao" value="<?php if ($acao!=""){ echo $acao;}else{echo "Inserir";} ?>" />
        <input type="submit" value="<?php if ($acao!=""){ echo $acao;}else{echo "Inserir";} ?>" class="botao" />


    </form>
    </br>
    </br>
    </br>
    </br>

</div>