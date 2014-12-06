<?php
    session_start();
    include_once "../classes/DadosDoBanco.php";
    include_once "../biblio.php";

    $admin = new DadosAdministrador();

    

    if(isset($_POST['irpara'])){
        $irpara = $_POST['irpara'];
    }

    $txt_login = strip_tags($_POST['txt_login']);
    $txt_senha = strip_tags($_POST['txt_senha']);

    $sql = "SELECT * FROM administracao where login ='". anti_sql_injection($txt_login)."' and senha = '". anti_sql_injection($txt_senha)."'";

    $totalReg = $admin->totalRegistros($sql);

    if($totalReg>0){
        $admin->verAdministracao($sql,0);
        $adm['id_administracao'] = $admin->getId();
        $adm['login'] = $admin->getLogin();
        $adm['senha'] = $admin->getSenha();

        $_SESSION['admin_logado_login'] = $adm['login'];
        $_SESSION['admin_logado_senha'] = $adm['senha'];

       echo    "<script>location.href='../index.php'</script>";

    }else{
       /* unset($_SESSION['admin_curso']['ID']);
        unset($_SESSION['admin_curso']['email']);
        unset($_SESSION['admin_curso']['NOME']);*/

        echo " <META HTTP-EQUIV='refresh' content='0;URL=../login.php'>
        <script> alert('Login não encontrado, Tente novamente')</script>
         ";
    }


?>
