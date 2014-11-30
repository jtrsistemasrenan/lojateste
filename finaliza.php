<?php

//se a sessao nao estiver sido inicializada entao inicializar
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    #Verifica se o usuário está logado se não então manda para página de logar se sim então manda para página de forma de pagamento
    if($_SESSION['cliente_curso']['ID']==null || $_SESSION['cliente_curso']['ID']==""){
        echo    "<script>location.href='index.php?link=5&irpara=6'</script>";
    }else{
        echo    "<script>location.href='index.php?link=6'</script>";
    }


?>