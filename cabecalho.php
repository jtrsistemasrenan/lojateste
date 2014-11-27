<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    if(isset($_SESSION['cliente_curso']['CLIENTE']))
    $cliente =  $_SESSION['cliente_curso']['CLIENTE'];
    else
        $cliente="";

    if($cliente==""){
        $cliente='visitante';
    }
?>

<div id="cabecalho_superior">

	<nav id="menu-cima">
        <span>Seja bem vindo a nossa loja <?php echo $cliente?></span>
		<ul>
			<li><a href="#">Minha conta</a></li>
			<li><a href="index.php?link=3">Meu carrinho</a></li>
			<li><a href="index.php?link=5">Logar</a></li>
			<li><a href="index.php?link=4">Cadastrar</a></li>
		</ul>
	</nav>
</div>
<div id="cabecalho_meio" class="fundo_azul">
	<h1> mjailton - as melhores vídeo aulas estão aqui </h1>
	
	<p class="sacola"> Nenhum item no seu carrinho de compras </p>
	<section class="busca">
		<form action="">
			<label>
				<span> buscar </span>
				<input type="search" name="pesquisa" id="pesquisa">
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