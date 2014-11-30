<?php

$idCliente = $_SESSION['cliente_curso']['ID'];

$cliente->setId($idCliente);
$cliente->mostrarDados();

$total_produto = 0;

$txt_cliente	    = $cliente-> getCliente();
$txt_endereco	    = $cliente-> getEndereco();
$txt_cidade 	    = $cliente-> getCidade();
$txt_bairro 	    = $cliente-> getBairro();
$txt_uf  		    = $cliente-> getUf();
$txt_cep  		    = $cliente-> getCep();
$txt_email  	    = $cliente-> getEmail();
$txt_sexo  		    = $cliente-> getSexo();
$txt_fone  		    = $cliente-> getFone();
$txt_senha		    = $cliente-> getSenha();
$txt_ativo		    = $cliente-> getAtivo();
$txt_numero         = $cliente->getNumero();
$txt_complemento    = $cliente->getComplemento();
$txt_ddd            = $cliente->getDDD();

if($idCliente !=""){
    ?>

    <div id="sanfona">
        <div id="accordion-1" class="formata_sanfona">
            <a> MEUS PEDIDOS </a>
            <div>

                <?php

                    $sql = "SELECT * FROM venda WHERE id_cliente = $idCliente ";
                    $total = $venda->totalRegistros($sql);

                for($i=0;$i<$total;$i++){
                    $venda->verVenda($sql,$i);
                    $idVenda = $venda->getId();



                ?>

                <div id="lista_venda">
                    <strong>Num compra: </strong><span><?php echo $venda->getId()?></span>
                    <strong>Data compra: </strong><span><?php echo databr($venda->getDataVenda(),2)?></span>
                    <strong>Cód Rastreio: </strong><span><?php echo $venda->getCodigoRastreamento()?></span>
                    <strong>Status: </strong><span><?php echo $venda->getStatusVenda()?></span>
                    <strong>Total: </strong><span><?php echo 'R$'. number_format($itens->somaVendas($idVenda),2,',','.');?></span>


                </div>

                    <!--Itens da Venda-->

                <div id="meus-pedidos">



                        <table cellpadding="0" cellspacing="0" border="1">

                            <thead>
                            <tr>

                                <th>Descrição do Produto</th>
                                <th>Quantidade</th>
                                <th>Preço unitário</th>
                                <th>Subtotal </th>

                            </tr>

                            </thead>

                            <tbody>

                            <?php
                            $sql_prod = "select i.* , p.* from itens_venda i , produto p
                            WHERE i.id_produto = p.id_produto and id_venda = $idVenda";

                            $totalReg = $itens->totalRegistros($sql_prod);
                            $valorTotal =0;

                            for($j=0;$j<$totalReg;$j++){
                                $itens->verItens($sql_prod,$j);
                                $subTotal = $itens->getPreco() * $itens->getQtde();
                                $codProd [$j]= $itens->getIdProduto();
                                ?>

                                <tr>

                                    <td>
                                        <img src="admin/fotos/<?php echo $itens->getImagemProduto()?>"  width="40" height="60">
                                        <strong><?php echo $carrinho->getTituloProduto()?></strong>
                                    </td>
                                    <td><?php echo $itens->getQtde()?> </td>
                                    <td><?php echo 'R$ '. number_format($itens->getPreco()*1,2,',','.'); ?> </td>
                                    <td> <?php echo 'R$ '. number_format($subTotal,2,',','.');?></td>
                                    <?php $total_produto+=$subTotal?>

                                </tr>

                            <?php } ?>

                            </tbody>


                        </table>
                    </div>

                <?php }?>

            </div>

            <a href="#"> DADOS DE ACESSO </a>
            <div>
                <div id="formulario-maior">
                    <form action="op_cliente.php" method="post" name="form3" id="form3" onsubmit="return validar()" >

                        <fieldset>
                            <legend> Dados para acesso </legend>
                            <label>
                                <span> E-mail (login)*</span>
                                <input type = "text" name="txt_email" id="txt_email" required autofocus value ="<?php echo $txt_email  ?>">
                            </label>

                            <label>
                                <span> Senha*</span>
                                <input type = "password" name="txt_senha" id="txt_senha" required value ="<?php echo $txt_senha  ?>">
                            </label>

                            <label>
                                <span> Confirmar senha*</span>
                                <input type = "password" name="txt_confirma" required id="txt_confirma" value ="">
                            </label>
                            <input type="hidden" name="id" value="<?php echo $idCliente?>">
                            <input type="hidden" name="acao" value="Atualizar_login">
                            <input type="submit" name= "Atualizar_login" id="Atualizar_login" value = "<?php if ($txt_cliente == ""){ echo "Atualizar"; } else { echo "Atualizar"; } ?>" class="botao" >

                        </fieldset>
                        </form>
                    </div>
            </div>

            <a href="#"> MEUS DADOS </a>

            <div>
                <div id="formulario-maior">
                    <form action="op_cliente.php" method="post" name="form4" id="form4" onsubmit="return validar()" >
                <fieldset>
                    <legend> Dados Pessoais </legend>
                    <label>
                        <span>Nome</span>
                        <input type="text" name="txt_cliente" id="txt_cliente" required value="<?php echo $txt_cliente ?>">
                    </label>
                    <label>
                        <span>Endereço</span>
                        <input type="text" name="txt_endereco" id="txt_endereco" required value="<?php echo $txt_endereco ?>">
                    </label>
                    <label>
                        <span>Número</span>
                        <input type="text" name="txt_numero" id="txt_numero" required value="<?php echo $txt_numero ?>">
                    </label>
                    <label>
                        <span>Complemento</span>
                        <input type="text" name="txt_complemento" id="txt_complemento"  value="<?php echo $txt_complemento ?>">
                    </label>
                    <label>
                        <span>Bairro</span>
                        <input type="text" name="txt_bairro" id="txt_bairro" required  value="<?php echo $txt_bairro ?>">
                    </label>
                    <label>
                        <span>Cidade</span>
                        <input type="text" name="txt_cidade" id="txt_cidade" required value="<?php echo $txt_cidade ?>">
                    </label>
                    <label>
                        <span>Cep</span>
                        <input type="text" name="txt_cep" id="txt_cep"  required value="<?php echo $txt_cep ?>">
                    </label>
                    <label>
                        <span>Estado</span>
                        <select name="txt_uf">
                            <option value="AC" <?php if($txt_uf=="AC"){echo "selected" ;} ?>>Acre</option>
                            <option value="AL" <?php if($txt_uf=="AL"){echo "selected" ;} ?>>Alagoas</option>
                            <option value="AM" <?php if($txt_uf=="AM"){echo "selected" ;} ?>>Amazonas</option>
                            <option value="AP" <?php if($txt_uf=="AP"){echo "selected" ;} ?>>Amapá</option>
                            <option value="BA" <?php if($txt_uf=="BA"){echo "selected" ;} ?>>Bahia</option>
                            <option value="CE" <?php if($txt_uf=="CE"){echo "selected" ;} ?>>Ceará</option>
                            <option value="DF" <?php if($txt_uf=="DF"){echo "selected" ;} ?>>Distrito Federal</option>
                            <option value="ES" <?php if($txt_uf=="ES"){echo "selected" ;} ?>>Espírito Santo</option>
                            <option value="GO" <?php if($txt_uf=="GO"){echo "selected" ;} ?>>Goiás</option>
                            <option value="MA" <?php if($txt_uf=="MA"){echo "selected" ;} ?>>Maranhã</option>
                            <option value="MG" <?php if($txt_uf=="MG"){echo "selected" ;} ?>>Minas Gerais</option>
                            <option value="MS" <?php if($txt_uf=="MS"){echo "selected" ;} ?>>Mato Grosso do Sul</option>
                            <option value="MT" <?php if($txt_uf=="MT"){echo "selected" ;} ?>>Mato Grosso</option>
                            <option value="PA" <?php if($txt_uf=="PA"){echo "selected" ;} ?>>Pará</option>
                            <option value="PB" <?php if($txt_uf=="PB"){echo "selected" ;} ?>>Paraíba</option>
                            <option value="PE" <?php if($txt_uf=="PE"){echo "selected" ;} ?>>Pernambuco</option>
                            <option value="PI" <?php if($txt_uf=="PI"){echo "selected" ;} ?>>Piauí</option>
                            <option value="PR" <?php if($txt_uf=="PR"){echo "selected" ;} ?>>Paraná</option>
                            <option value="RJ" <?php if($txt_uf=="RJ"){echo "selected" ;} ?>>Rio de Janeiro</option>
                            <option value="RN" <?php if($txt_uf=="RN"){echo "selected" ;} ?>>Rio Grande do Norte</option>
                            <option value="RO" <?php if($txt_uf=="RO"){echo "selected" ;} ?>>Rondônia</option>
                            <option value="RR" <?php if($txt_uf=="RR"){echo "selected" ;} ?>>Roraima</option>
                            <option value="RS" <?php if($txt_uf=="RS"){echo "selected" ;} ?>>Rio Grande do Sul</option>
                            <option value="SC" <?php if($txt_uf=="SC"){echo "selected" ;} ?>>Santa Catarina</option>
                            <option value="SE" <?php if($txt_uf=="SE"){echo "selected" ;} ?>>Sergipe</option>
                            <option value="SP" <?php if($txt_uf=="SP"){echo "selected" ;} ?>>São Paulo</option>
                            <option value="TO" <?php if($txt_uf=="TO"){echo "selected" ;} ?>>Tocantins</option>
                        </select>
                    </label>
                    <label>
                        <span>DDD</span>
                        <input type="text" name="txt_ddd" id="txt_ddd" value="<?php echo $txt_ddd ?>">
                    </label>

                    <label>
                        <span>Telefone</span>
                        <input type="text" name="txt_fone" id="txt_fone" value="<?php echo $txt_fone ?>">
                    </label>


                    <input type="hidden" name="id" value="<?php echo $idCliente?>">
                    <input type="hidden" name="acao" value="atualiza_cadastro">
                    <input type="submit" name= "atualiza_cadastro" id="atualiza_cadastro" value = "Atualizar" class="botao">
                </fieldset>
                </form>
                </div>
            </div>


        </div>

</div>


<?php }?>