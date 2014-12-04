<?php

//se a sessao nao estiver sido inicializada entao inicializar
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

    include_once ("admin/classes/ManipulacaoDeDados.class.php");
    include_once ("admin/classes/DadosDoBanco.php");
    $cad = new ManipulacaoDeDados();
    $carrinho = new DadosCarrinho();

    $id_pedido = $_SESSION['id_pedido_curso'];
    $id_cliente = $_SESSION['cliente_curso']['ID'];

    $data = date('Y-m-d');

    //inserir a informação para a tabela de venda

    $cad->setTabela('venda');
    $cad->setCampos('id_cliente,data_venda,pago,status_venda');
    $cad->setDados("'$id_cliente','$data','N','Venda iniciada'");
    $cad->inserir();

    $ultimoCodigo = $cad->ultimoRegistro("id_venda","venda");

    $sql= $sql = "select c.* , p.* from carrinho c , produto p WHERE c.id_produto = p.id_produto and id_pedido = $id_pedido";
    $totalReg = $carrinho->totalRegistros($sql);
    $valorTotal =0;

    for($i=0;$i<$totalReg;$i++) {
        $carrinho->verCarrinho($sql, $i);

        $id_produto = $carrinho->getId();
        $valor = $carrinho->getValor();
        $qtde = $carrinho->getQtde();

        $cad->setTabela('itens_venda');
        $cad->setCampos('id_venda,id_produto,valor_item,qtde');
        $cad->setDados("'$ultimoCodigo','$id_produto',$valor,$qtde");
        $cad->inserir();

    }



    mysql_query("delete from carrinho WHERE id_pedido = $id_pedido");
    mysql_query("delete from pedido WHERE id_pedido = $id_pedido");
    unset($_SESSION['id_pedido_curso']);


    /*PAGSEGURO*/

require_once ("admin/classes/PagSeguroLibrary/PagSeguroLibrary.php");

    $pagseguro = new PagSeguroPaymentRequest();
    $pagseguro->setCurrency('BRL');
    $pagseguro->setShippingType(3);
    $pagseguro->setReference("$ultimoCodigo");

    //O cliente foi criado no index
    $cliente->setId($id_cliente);
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

    //Informacoes do comprador
    $pagseguro->setSender(
    $txt_cliente,
    $txt_email,
    $txt_ddd,
    $txt_fone
    );

    //Informaçoes para o frete
    $pagseguro->setShippingAddress(
     $txt_cep,
    $txt_endereco,
    $txt_numero,
    $txt_complemento,
    $txt_bairro,
    $txt_cidade,
    $txt_uf,
    'BRA'
    );

    //Adicionar itens de compra

        $ultimoCodigo = $cad->ultimoRegistro("id_venda","venda");

        $sql= $sql = "select i.* , p.* from itens_venda i , produto p WHERE i.id_produto = p.id_produto and id_venda = $ultimoCodigo";
        $totalReg = $itens->totalRegistros($sql);
        $valorTotal =0;

        for($i=0;$i<$totalReg;$i++) {
            $itens->verItens($sql, $i);

            $pagseguro->addItem($itens->getId(), $itens->getTituloProduto(), $itens->getQtde(), number_format($itens->getValor(),2,'.',','));

        }


        // Informando as credenciais
        $credentials = new PagSeguroAccountCredentials(
            'renanwillamy2@gmail.com',
            'CABEA7ADFF6343939B294FF9A178192F'
        );

        // fazendo a requisição a API do PagSeguro pra obter a URL de pagamento
        $url = $pagseguro->register($credentials);

?>
<a href="<?php echo $url?>"><img src="imagens/botao-de-compra-do-pagseguro.gif" ></a>


