<?php

$id	  = $_SESSION[cliente_curso][IDCLIENTE];
$cliente->setId($id);
$cliente->mostrarDados();

$txt_cliente	= $cliente-> getCliente();
$txt_endereco	= $cliente-> getEndereco();
$txt_cidade 	= $cliente-> getCidade();
$txt_bairro 	= $cliente-> getBairro();
$txt_uf  		= $cliente-> getUf();
$txt_cep  		= $cliente-> getCep();
$txt_email  	= $cliente-> getEmail();
$txt_sexo  		= $cliente-> getSexo();
$txt_fone  		= $cliente-> getFone();
$txt_senha		= $cliente-> getSenha();
$txt_ativo		= $cliente-> getAtivo();

$txt_complemento= $cliente-> getComplemento();
$txt_ddd		= $cliente-> getDDD();
$txt_numero		= $cliente-> getNumero();


?>
<script type="text/javascript">
    function  validar(){
        if(document.form1.txt_confirma.value!=document.form1.txt_senha.value){
            alert("O valor de confirma tem que ser igual à senha");
            document.form1.txt_confirma.focus();
            return(false);
        }


        if(document.form1.txt_email.value.indexOf('@') ==-1 || document.form1.txt_email.value.indexOf('.')== -1 ){
            alert("email inválido");
            document.form1.txt_email.focus();
            return(false);
        }
    }
</script>
<div id="formulario-maior">
    <form action="op_cliente.php" method="post" name="form1" id="form1" onsubmit="return validar()" >

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
                <input type = "password" name="txt_confirma" required id="txt_confirma" value ="<?php echo $txt_senha  ?>">
            </label>
        </fieldset>
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


            <input type="hidden" name ="id" value="<?php echo $id ?>">
            <input type="hidden" name ="acao" value="<?php if ($txt_cliente == ""){ echo "Inserir"; } else { echo "Alterar"; } ?>">

            <input type="submit" name= "logar" id="logar" value = "<?php if ($txt_cliente == ""){ echo "Cadastrar"; } else { echo "Atualizar"; } ?>" class="botao" >
        </fieldset>
    </form>
</div>