<?php
if(isset($_SESSION['admin_logado_login']) && isset($_SESSION['admin_logado_login'])){
    unset($_SESSION['admin_logado_login']);
    unset($_SESSION['admin_logado_login']);
    echo    "<script>location.href='login.php'</script>";
}else{
    echo    "<script>location.href='login.php'</script>";
}
