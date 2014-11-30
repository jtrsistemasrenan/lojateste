<?php
    session_start();
    include_once "admin/classes/DadosDoBanco.php";
    include_once "admin/biblio.php";

    $cliente = new DadosCliente();

    //ir para pagina principal caso dê algo errado
    $irpara = "1";

    if(isset($_POST['irpara'])){
        $irpara = $_POST['irpara'];
    }

    $txt_email = strip_tags($_POST['txt_email']);
    $txt_senha = strip_tags($_POST['txt_senha']);

    $sql = "SELECT * FROM cliente where email ='". anti_sql_injection($txt_email)."' and senha = '". anti_sql_injection($txt_senha)."'";

    $totalReg = $cliente->totalRegistros($sql);

    if($totalReg>0){
        $cliente->verCliente($sql,0);
        $cli['ID'] = $cliente->getId();
        $cli['CLIENTE'] = $cliente->getCliente();
        $cli['EMAIL'] = $cliente->getEmail();

        $_SESSION['cliente_curso'] = $cli;

       echo    "<script>location.href='index.php?link=$irpara'</script>";

    }else{
       /* unset($_SESSION['cliente_curso']['ID']);
        unset($_SESSION['cliente_curso']['email']);
        unset($_SESSION['cliente_curso']['NOME']);*/

        echo " <META HTTP-EQUIV='refresh' content='0;URL=index.php?link=$irpara'>
        <script> alert('Login não encontrado, Tente novamente')</script>
         ";
    }


?>
