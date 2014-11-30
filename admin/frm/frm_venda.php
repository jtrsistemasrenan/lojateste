<?php

    $acao = "";
    $id = "";
    if(isset($_GET['acao']))
    $acao = $_GET['acao'];
    if(isset($_GET['id_venda']))
    $id = $_GET['id_venda'];



        include_once "./classes/DadosDoBanco.php";
        $dados = new DadosVenda();
        $dados->setId($id);
        $dados->mostrarDados();

        $txt_data_venda = $dados->getDataVenda();
        $txt_pago = $dados->getPago();
        $txt_codigo_rastreamento = $dados->getCodigoRastreamento();
        $txt_status = $dados->getStatusVenda();



?>

<div id="formulario">

    <h2> Cadastro de alguma coisa </h2>
    <form action="./op/op_venda.php" method="post">

        <div class="dois-campos">
            <label>
                <span class = "titulo">Data da Venda</span>
                <input type="text" name="txt_data_venda" id="txt_data_venda" value="<?php echo $txt_data_venda; ?>"/>
            </label>
            <label>
                <span class = "titulo">Pago</span>
               <select name="txt_pago" id="txt_ativo">
                   <option value ='s' <?php if($txt_pago=='s') echo 'selected';?>>SIM</option>
                   <option value ='n' <?php if($txt_pago=='n') echo 'selected';?>>NÃO</option>
               </select>
            </label>
        </div>

        <div class="dois-campos">
            <label>
                <span class = "titulo">Codigo de Rastreamento</span>
                <input type="text" name="txt_codigo_rastreamento" id="txt_codigo_rastreamento" value="<?php echo $txt_codigo_rastreamento; ?>"/>
            </label>
            <label>
                <span class = "titulo">Status</span>
                <select name="txt_status" id="txt_status">
                    <option value ='Venda Iniciada' <?php if($txt_status=='Venda Iniciada') echo 'selected';?>>Venda Iniciada</option>
                    <option value ='Postado' <?php if($txt_status=='Postado') echo 'selected';?>>Postado</option>
                    <option value ='Entregue' <?php if($txt_status=='Entregue') echo 'selected';?>>Entregue</option>
                </select>
            </label>
        </div>

        <input type="hidden" name="acao" value="<?php echo $acao?>" />
        <input type="hidden" name="id_venda" value="<?php echo $id; ?>" />

        <input type="submit" value="<?php echo $acao?>" class="botao" />

    </form>


</div>