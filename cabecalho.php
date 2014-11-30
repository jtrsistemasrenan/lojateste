<?php

//se a sessao nao estiver sido inicializada entao inicializar
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    if(isset($_SESSION['cliente_curso']['CLIENTE']))
    $nomecliente =  $_SESSION['cliente_curso']['CLIENTE'];
    else
        $nomecliente="";

    //Verifica se o usuário está logado se não então imprima o nome do usuário será visitante
    if($nomecliente==""){
        $nomecliente='visitante';
        //se o cliente for visitante no menu tem que ficar logar
        $txt_log= "Logar";
        //esse link leva para pagina de logar
        $txt_link = "5";
    }else{
        //se o cliente estiver logado no menu tem que ficar Sair
        $txt_log= "Sair";
        //esse link leva para pagina de logoff
        $txt_link = "9";
    }

    $id_pedido =0;
    //caso a $_SESSION["id_pedido_curso"] esteja vazia entao id_pedido = 0 para nao dar erro na busca
    if(isset($_SESSION["id_pedido_curso"])) {
        $id_pedido = $_SESSION["id_pedido_curso"];
    }

    $total_item = $carrinho->totalRegistros("SELECT * FROM carrinho WHERE id_pedido = $id_pedido");

    if($total_item==0){
        $msg_itens = 'Nenhum item no seu carrinho de compras';
    }else if($total_item==1){
        $msg_itens = '01 item no seu carrinho de compras';
    }else{
        $msg_itens = $total_item.' itens no seu carrinho de compras';
    }

?>

<div id="cabecalho_superior">

	<nav id="menu-cima">
        <span>Seja bem vindo a nossa loja <?php echo $nomecliente?></span>
		<ul>
			<li><a href="index.php?link=10">Minha conta</a></li>
			<li><a href="index.php?link=3">Meu carrinho</a></li>
			<li><a href="index.php?link=<?php echo $txt_link ?>&irpara=10"><?php echo $txt_log?></a></li>
			<li><a href="index.php?link=4">Cadastrar</a></li>
		</ul>
	</nav>
</div>
<div id="cabecalho_meio" class="fundo_azul">
	<h1> mjailton - as melhores vídeo aulas estão aqui </h1>
	
	<p class="sacola"> <?php echo $msg_itens ?> </p>
	<section class="busca">
		<form action="index.php?link=11" method="post">
			<label>
				<span> buscar </span>
				<input type="search" name="txt_pesquisa" id="txt_pesquisa" >
				<input type="image" src="imagens/lupa.png">
		</form>
	</section>
</div>
<div id="cabecalho_inferior" class="fundo_principal">
	<nav id="menu-principal">
		<ul>
			<li class="linha-vertical"><a href="index.php">Home</a></li>
			<li class="linha-vertical"><a href="#">Produtos</a></li>
			<li class="linha-vertical"><a href="#">Fale Conosco</a></li>
			<li class="linha-vertical"><a href="#">Quem Somos</a></li>
		</ul>
	</nav>
</div>