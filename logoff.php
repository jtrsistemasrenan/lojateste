<?php

//se a sessao nao estiver sido inicializada entao inicializar
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    unset($_SESSION['cliente_curso']);

echo    "<script>location.href='index.php?link=1'</script>";