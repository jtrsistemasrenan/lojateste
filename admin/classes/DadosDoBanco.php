<?php

//usa-se o include para se usar funcoes do ConexaoMysql.class.php
include_once "ConexaoMysql.class.php";


class DadosCliente extends conexaoMySQL{
    private $id, $cliente, $endereco, $cidade, $bairro, $uf, $cep, $email, $sexo,$fone, $senha2, $ativo,

        $numero, $ddd, $complemento;

    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this-> id;
    }
    public function getCliente(){
        return $this-> cliente;
    }
    public function getEndereco(){
        return $this-> endereco;
    }
    public function getCidade(){
        return $this-> cidade;
    }
    public function getBairro(){
        return $this-> bairro;
    }
    public function getUf(){
        return $this-> uf;
    }
    public function getCep(){
        return $this-> cep;
    }
    public function getEmail(){
        return $this-> email;
    }
    public function getSexo(){
        return $this-> sexo;
    }
    public function getFone(){
        return $this-> fone;
    }

    public function getSenha(){
        return $this-> senha2;
    }
    public function getAtivo(){
        return $this-> ativo;
    }


    public function getNumero(){
        return $this-> numero;
    }
    public function getDDD(){
        return $this-> ddd;
    }
    public function getComplemento(){
        return $this-> complemento;
    }





    public function mostrarDados(){
        $sql= "SELECT * FROM  cliente WHERE id_cliente = '$this->id'";
        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);

        $this->id  			= $linha["id_cliente"];
        $this->cliente  	= $linha["cliente"];
        $this->endereco  	= $linha["endereco"];
        $this->cidade  		= $linha["cidade"];
        $this->bairro  		= $linha["bairro"];
        $this->uf  			= $linha["uf"];
        $this->cep  		= $linha["cep"];
        $this->email  		= $linha["email"];
        $this->sexo  		= $linha["sexo"];
        $this->fone  		= $linha["fone"];
        $this->senha2  		= $linha["senha"];
        $this->ativo  		= $linha["ativo_cliente"];


        $this->numero  		= $linha["numero"];
        $this->ddd  		= $linha["ddd"];
        $this->complemento 	= $linha["complemento"];


    }
    //Conta quantos registro exitem apartir de um select from
    public function totalRegistros($sql){
        $qry = self::executarSQL($sql);
        $total= self::contaDados($qry);
        return $total;
    }


    public function verCliente($sql,$i){
        $qry = mysql_query($sql);

        $this->id  			= mysql_result($qry,$i,"id_cliente");
        $this->cliente  	= mysql_result($qry,$i,"cliente");
        $this->endereco  	= mysql_result($qry,$i,"endereco");
        $this->cidade  		= mysql_result($qry,$i,"cidade");
        $this->bairro  		= mysql_result($qry,$i,"bairro");
        $this->uf  			= mysql_result($qry,$i,"uf");
        $this->cep  		= mysql_result($qry,$i,"cep");
        $this->email  		= mysql_result($qry,$i,"email");
        $this->sexo  		= mysql_result($qry,$i,"sexo");
        $this->fone  		= mysql_result($qry,$i,"fone");
        $this->senha2  		= mysql_result($qry,$i,"senha");
        $this->ativo  		= mysql_result($qry,$i,"ativo_cliente");

    }



}

/**
 * Class DadosCategoria classe utilizada para recuperar e setar dados da categoria por exemplo id ,categoria, ordem etc.
 */
class DadosCategoria extends conexaoMysql
{
    private $id, $categoria, $slug_categoria, $ordemm_categoria, $ativo_categoria;

    /**
     * @return mixed
     */
    public function getAtivoCategoria()
    {
        return $this->ativo_categoria;
    }

    /**
     * @return mixed
     * @param
     * @autor
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getOrdemmCategoria()
    {
        return $this->ordemm_categoria;
    }

    /**
     * @return mixed
     */
    public function getSlugCategoria()
    {
        return $this->slug_categoria;
    }

    /**
     * @param mixed $ativo_categoria
     */
    public function setAtivoCategoria($ativo_categoria)
    {
        $this->ativo_categoria = $ativo_categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * @param mixed $ordemm_categoria
     */
    public function setOrdemmCategoria($ordemm_categoria)
    {
        $this->ordemm_categoria = $ordemm_categoria;
    }

    /**
     * @param mixed $id_categoria
     */
    public function setId($id_categoria)
    {
        $this->id = $id_categoria;
    }

    /**
     * @param mixed $slug_categoria
     */
    public function setSlugCategoria($slug_categoria)
    {
        $this->slug_categoria = $slug_categoria;
    }

    /**
     * Armazena todos os dados da categoria nas variáveis do objeto para poderem ser utilizadas
     * atraves dos getters. Obs: para chamar esse metodo é necessário setar o id primeiro.
     */
    function mostrarDados()
    {
        $sql = "select * from categoria WHERE id_categoria = $this->id";
        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);

        $this->id = $linha['id_categoria'];
        $this->categoria = $linha['categoria'];
        $this->slug_categoria = $linha['slug_categoria'];
        $this->ativo_categoria = $linha['ativo_categoria'];
        $this->ordemm_categoria = $linha['ordem_categoria'];

    }

    public function comboCategoria($id){
        $sql = "select * from categoria";
        $qry = self::executarSQL($sql);

        while($linha = self::listar($qry)){

            if($id==$linha["id_categoria"]){
                $selecionado = "selected=selected";
            }else{
                $selecionado="";
            }

            echo "<option value = $linha[id_categoria] $selecionado>$linha[categoria]</option>";

        }

    }

    //Conta quantos registro exitem apartir de um select from
    public function totalRegistros($sql){
        $query = self::executarSQL($sql);
        $total = self::contaDados($query);

        return $total;

    }

    public function verCategorias($sql,$i){
        $qry = mysql_query($sql);

        $this->id               = mysql_result($qry,$i,'id_categoria');
        $this->categoria        = mysql_result($qry,$i,'categoria');
        $this->slug_categoria   = mysql_result($qry,$i,'slug_categoria');
        $this->ativo_categoria  = mysql_result($qry,$i,'ativo_categoria');
        $this->ordemm_categoria = mysql_result($qry,$i,'ordem_categoria');


    }


}

/**
 * Class DadosBanner classe utilizada para recuperar e setar dados do banner por exemplo id ,titulo_banner etc.
 */
class DadosBanner extends conexaoMysql
{
    private $id, $titulo_banner, $alt, $url_banner, $ativo_banner, $imagem_banner;

    /**
     * @return mixed
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * @param mixed $alt
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getImagemBanner()
    {
        return $this->imagem_banner;
    }

    /**
     * @param mixed $imagem_banner
     */
    public function setImagemBanner($imagem_banner)
    {
        $this->imagem_banner = $imagem_banner;
    }

    /**
     * @return mixed
     */
    public function getTituloBanner()
    {
        return $this->titulo_banner;
    }

    /**
     * @param mixed $titulo_banner
     */
    public function setTituloBanner($titulo_banner)
    {
        $this->titulo_banner = $titulo_banner;
    }

    /**
     * @return mixed
     */
    public function getUrlBanner()
    {
        return $this->url_banner;
    }

    /**
     * @param mixed $url_banner
     */
    public function setUrlBanner($url_banner)
    {
        $this->url_banner = $url_banner;
    }

    /**
     * @return mixed
     */
    public function getAtivoBanner()
    {
        return $this->ativo_banner;
    }

    /**
     * @param mixed $ativo_banner
     */
    public function setAtivoBanner($ativo_banner)
    {
        $this->ativo_banner = $ativo_banner;
    }

    /**
     * Armazena todos os dados do banner nas variáveis do objeto para poderem ser utilizadas
     * atraves dos getters. Obs: para chamar esse metodo é necessário setar o id primeiro.
     */
    function mostrarDados()
    {
        $sql = "select * from banner WHERE id_banner = $this->id";
        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);

        $this->id = $linha['id_banner'];
        $this->titulo_banner = $linha['titulo_banner'];
        $this->alt = $linha['alt'];
        $this->url_banner = $linha['url_banner'];
        $this->ativo_banner = $linha['ativo_banner'];
        $this->imagem_banner = $linha['imagem_banner'];

    }


}

/**
 * Class DadosProduto classe utilizada para recuperar e setar dados do produto por exemplo id ,titulo_produto etc.
 */
class DadosProduto extends conexaoMysql
{
    private $id, $id_categoria, $titulo_produto, $preco,
        $autor, $duracao,$descricao,$conteudo,$slug_produto,$ativo_produto,$imagem_produto;

    /**
     * @return mixed
     */
    public function getAtivoProduto()
    {
        return $this->ativo_produto;
    }

    /**
     * @param mixed $ativo_produto
     */
    public function setAtivoProduto($ativo_produto)
    {
        $this->ativo_produto = $ativo_produto;
    }

    /**
     * @return mixed
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param mixed $autor
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    /**
     * @return mixed
     */
    public function getConteudo()
    {
        return $this->conteudo;
    }

    /**
     * @param mixed $conteudo
     */
    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getDuracao()
    {
        return $this->duracao;
    }

    /**
     * @param mixed $duracao
     */
    public function setDuracao($duracao)
    {
        $this->duracao = $duracao;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->id_categoria;
    }

    /**
     * @param mixed $id_categoria
     */
    public function setIdCategoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;
    }

    /**
     * @return mixed
     */
    public function getImagemProduto()
    {
        return $this->imagem_produto;
    }

    /**
     * @param mixed $imagem_produto
     */
    public function setImagemProduto($imagem_produto)
    {
        $this->imagem_produto = $imagem_produto;
    }

    /**
     * @return mixed
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param mixed $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    /**
     * @return mixed
     */
    public function getSlugProduto()
    {
        return $this->slug_produto;
    }

    /**
     * @param mixed $slug_produto
     */
    public function setSlugProduto($slug_produto)
    {
        $this->slug_produto = $slug_produto;
    }

    /**
     * @return mixed
     */
    public function getTituloProduto()
    {
        return $this->titulo_produto;
    }

    /**
     * @param mixed $titulo_produto
     */
    public function setTituloProduto($titulo_produto)
    {
        $this->titulo_produto = $titulo_produto;
    }



    /**
     * Armazena todos os dados do produto nas variáveis do objeto para poderem ser utilizadas
     * atraves dos getters. Obs: para chamar esse metodo é necessário setar o id primeiro.
     */
    function mostrarDados()
    {
        $sql = "select * from produto WHERE id_produto  = $this->id";
        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);

        $this->id               = $linha['id_produto'];
        $this->id_categoria     = $linha['id_categoria'];
        $this->titulo_produto   = $linha['titulo_produto'];
        $this->preco            = $linha['preco'];
        $this->autor            = $linha['autor'];
        $this->duracao          = $linha['duracao'];
        $this->descricao        = $linha['descricao'];
        $this->conteudo         = $linha['conteudo'];
        $this->slug_produto     = $linha['slug_produto'];
        $this->ativo_produto    = $linha['ativo_produto'];
        $this->imagem_produto   = $linha['imagem_produto'];

    }
    //Conta quantos registro exitem apartir de um select from
        public function totalRegistros($sql){
        $query = self::executarSQL($sql);
        $total = self::contaDados($query);

        return $total;

    }

        public function verProdutos($sql,$i){
        $qry = mysql_query($sql);

            $this->id               = mysql_result($qry,$i,'id_produto');
            $this->id_categoria     = mysql_result($qry,$i,'id_categoria');
            $this->titulo_produto   = mysql_result($qry,$i,'titulo_produto');
            $this->preco            = mysql_result($qry,$i,'preco');
            $this->autor            = mysql_result($qry,$i,'autor');
            $this->duracao          = mysql_result($qry,$i,'duracao');
            $this->descricao        = mysql_result($qry,$i,'descricao');
            $this->conteudo         = mysql_result($qry,$i,'conteudo');
            $this->slug_produto     = mysql_result($qry,$i,'slug_produto');
            $this->ativo_produto    = mysql_result($qry,$i,'ativo_produto');
            $this->imagem_produto   = mysql_result($qry,$i,'imagem_produto');



    }







}

/**
 * Class DadosCarrinho classe utilizada para recuperar e setar dados do carrinho por exemplo id ,valor etc.
 */
class DadosCarrinho extends conexaoMysql
{
    private $id, $id_pedido, $id_produto, $valor, $qtde;

    private $id_categoria, $titulo_produto, $preco,
        $autor, $duracao, $descricao, $conteudo, $slug_produto, $ativo_produto, $imagem_produto;

    /**
     * @return mixed
     */
    public function getAtivoProduto()
    {
        return $this->ativo_produto;
    }

    /**
     * @param mixed $ativo_produto
     */
    public function setAtivoProduto($ativo_produto)
    {
        $this->ativo_produto = $ativo_produto;
    }

    /**
     * @return mixed
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param mixed $autor
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    /**
     * @return mixed
     */
    public function getConteudo()
    {
        return $this->conteudo;
    }

    /**
     * @param mixed $conteudo
     */
    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getDuracao()
    {
        return $this->duracao;
    }

    /**
     * @param mixed $duracao
     */
    public function setDuracao($duracao)
    {
        $this->duracao = $duracao;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->id_categoria;
    }

    /**
     * @param mixed $id_categoria
     */
    public function setIdCategoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;
    }

    /**
     * @return mixed
     */
    public function getIdPedido()
    {
        return $this->id_pedido;
    }

    /**
     * @param mixed $id_pedido
     */
    public function setIdPedido($id_pedido)
    {
        $this->id_pedido = $id_pedido;
    }

    /**
     * @return mixed
     */
    public function getIdProduto()
    {
        return $this->id_produto;
    }

    /**
     * @param mixed $id_produto
     */
    public function setIdProduto($id_produto)
    {
        $this->id_produto = $id_produto;
    }

    /**
     * @return mixed
     */
    public function getImagemProduto()
    {
        return $this->imagem_produto;
    }

    /**
     * @param mixed $imagem_produto
     */
    public function setImagemProduto($imagem_produto)
    {
        $this->imagem_produto = $imagem_produto;
    }

    /**
     * @return mixed
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param mixed $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    /**
     * @return mixed
     */
    public function getQtde()
    {
        return $this->qtde;
    }

    /**
     * @param mixed $qtde
     */
    public function setQtde($qtde)
    {
        $this->qtde = $qtde;
    }

    /**
     * @return mixed
     */
    public function getSlugProduto()
    {
        return $this->slug_produto;
    }

    /**
     * @param mixed $slug_produto
     */
    public function setSlugProduto($slug_produto)
    {
        $this->slug_produto = $slug_produto;
    }

    /**
     * @return mixed
     */
    public function getTituloProduto()
    {
        return $this->titulo_produto;
    }

    /**
     * @param mixed $titulo_produto
     */
    public function setTituloProduto($titulo_produto)
    {
        $this->titulo_produto = $titulo_produto;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }


    /**
     * Armazena todos os dados do produto nas variáveis do objeto para poderem ser utilizadas
     * atraves dos getters. Obs: para chamar esse metodo é necessário setar o id primeiro.
     */
    function mostrarDados()
    {
        $sql = "select c.* , p.* from carrinho c , produto p WHERE c.id_produto = p.id_produto and id_pedido = $this->id_pedido";
        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);

        $this->id = $linha['id_produto'];
        $this->id_categoria = $linha['id_categoria'];
        $this->titulo_produto = $linha['titulo_produto'];
        $this->preco = $linha['preco'];
        $this->autor = $linha['autor'];
        $this->duracao = $linha['duracao'];
        $this->descricao = $linha['descricao'];
        $this->conteudo = $linha['conteudo'];
        $this->slug_produto = $linha['slug_produto'];
        $this->ativo_produto = $linha['ativo_produto'];
        $this->imagem_produto = $linha['imagem_produto'];

        $this->id_pedido = $linha['id_pedido'];
        $this->id_produto = $linha['id_produto'];
        $this->valor = $linha['valor'];
        $this->qtde = $linha['qtde'];

    }

    //Conta quantos registro exitem apartir de um select from
    public function totalRegistros($sql)
    {
        $query = self::executarSQL($sql);
        $total = self::contaDados($query);

        return $total;

    }

    public function verCarrinho($sql, $i)
    {
        $qry = mysql_query($sql);

        // tabela do produto
        $this->id = mysql_result($qry, $i, 'id_produto');
        $this->id_categoria = mysql_result($qry, $i, 'id_categoria');
        $this->titulo_produto = mysql_result($qry, $i, 'titulo_produto');
        $this->preco = mysql_result($qry, $i, 'preco');
        $this->autor = mysql_result($qry, $i, 'autor');
        $this->duracao = mysql_result($qry, $i, 'duracao');
        $this->descricao = mysql_result($qry, $i, 'descricao');
        $this->conteudo = mysql_result($qry, $i, 'conteudo');
        $this->slug_produto = mysql_result($qry, $i, 'slug_produto');
        $this->ativo_produto = mysql_result($qry, $i, 'ativo_produto');
        $this->imagem_produto = mysql_result($qry, $i, 'imagem_produto');

        //tabela do carrinho
        $this->id_pedido = mysql_result($qry, $i, 'id_pedido');
        $this->id_produto = mysql_result($qry, $i, 'id_produto');
        $this->valor = mysql_result($qry, $i, 'valor');
        $this->qtde = mysql_result($qry, $i, 'qtde');


    }

}
class DadosVenda extends conexaoMySQL{

    private $id,$id_cliente, $data_venda, $codigo_rastreamento, $pago, $status_venda;



    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this-> id;
    }
    public function getIdCliente(){
        return $this-> id_cliente;
    }
    public function getDataVenda(){
        return $this-> data_venda;
    }
    public function getCodigoRastreamento(){
        return $this-> codigo_rastreamento;
    }
    public function getPago(){
        return $this-> pago;
    }
    public function getStatusVenda(){
        return $this-> status_venda;
    }

    /**
     * Armazena todos os dados da venda nas variáveis do objeto para poderem ser utilizadas
     * atraves dos getters. Obs: para chamar esse metodo é necessário setar o id primeiro.
     */
    public function mostrarDados(){
        $sql= "SELECT * FROM venda WHERE id_venda = '$this->id'";
        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);


        $this->id  					= $linha["id_venda"];
        $this->id_cliente  			= $linha["id_cliente"];
        $this->data_venda  			= $linha["data_venda"];
        $this->codigo_rastreamento 	= $linha["codigo_rastreamento"];
        $this->pago  				= $linha["pago"];
        $this->status_venda  		= $linha["status_venda"];

    }

    public function totalRegistros($sql){
        $qry = self::executarSQL($sql);
        $total= self::contaDados($qry);

        return $total;
    }



    public function verVenda($sql,$i){
        $qry = mysql_query($sql);

        $this->id  					= mysql_result($qry,$i,"id_venda");
        $this->id_cliente  			= mysql_result($qry,$i,"id_cliente");
        $this->data_venda  			= mysql_result($qry,$i,"data_venda");
        $this->codigo_rastreamento 	= mysql_result($qry,$i,"codigo_rastreamento");
        $this->pago  				= mysql_result($qry,$i,"pago");
        $this->status_venda  		= mysql_result($qry,$i,"status_venda");

    }

}

class DadosAdministrador extends conexaoMySQL{
    private $id, $nome, $email, $login, $tx_senha;

    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this-> id;
    }

    public function getNome(){
        return $this-> nome;
    }
    public function getEmail(){
        return $this-> email;
    }
    public function getLogin(){
        return $this-> login;
    }
    public function getSenha(){
        return $this-> tx_senha;
    }


    public function mostrarDados(){
        $sql= "SELECT * FROM  administracao WHERE id_administracao = '$this->id'";
        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);

        $this->id  		= $linha["id_administracao"];
        $this->nome  	= $linha["nome"];
        $this->email  	= $linha["email"];
        $this->login  	= $linha["login"];
        $this->tx_senha  = $linha["senha"];


    }


    public function totalRegistros($sql){
        $qry = self::executarSQL($sql);
        $total= self::contaDados($qry);

        return $total;
    }


    public function verAdministracao($sql,$i){
        $qry = mysql_query($sql);


        $this->id  			= mysql_result($qry,$i,"id_administracao");
        $this->nome  		= mysql_result($qry,$i,"nome");
        $this->email  		= mysql_result($qry,$i,"email");
        $this->login  		= mysql_result($qry,$i,"login");
        $this->tx_senha  	= mysql_result($qry,$i,"senha");

    }


}


class DadosItensVenda extends conexaoMySQL{

    private $id,$id_venda, $id_produto, $valor, $qtde;

    private $id_categoria, $titulo_produto, $preco, $autor, $duracao,
        $descricao, $conteudo, $slug_produto, $ativo_produto, $imagem_produto;

    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this-> id;
    }
    public function getIdCategoria(){
        return $this-> id_categoria;
    }
    public function getTituloProduto(){
        return $this-> titulo_produto;
    }
    public function getPreco(){
        return $this-> preco;
    }
    public function getAtivo(){
        return $this-> ativo_banner;
    }
    public function getAutor(){
        return $this-> autor;
    }
    public function getDuracao(){
        return $this-> duracao;
    }
    public function getDescricao(){
        return $this-> descricao;
    }
    public function getConteudo(){
        return $this-> conteudo;
    }
    public function getSlugProduto(){
        return $this-> slug_produto;
    }
    public function getAtivoProduto(){
        return $this-> ativo_produto;
    }
    public function getImagemProduto(){
        return $this-> imagem_produto;
    }


    public function getIdVenda(){
        return $this-> id_venda;
    }
    public function getIdProduto(){
        return $this-> id_produto;
    }
    public function getValor(){
        return $this-> valor;
    }
    public function getQtde(){
        return $this-> qtde;
    }
    /**
     * Armazena todos os dados dos itens de venda nas variáveis do objeto para poderem ser utilizadas
     * atraves dos getters. Obs: para chamar esse metodo é necessário setar o id primeiro.
     */
    public function mostrarDados(){
        $sql= "SELECT i.*, p.* FROM itens_venda i, produto p where  i.id_produto = p.id_produto and id_venda = '$this->id_venda'";
        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);

        $this->id  				= $linha["id_item"];
        $this->id_categoria  	= $linha["id_categoria"];
        $this->titulo_produto  	= $linha["titulo_produto"];
        $this->preco  			= $linha["preco"];
        $this->autor  			= $linha["autor"];
        $this->duracao  		= $linha["duracao"];
        $this->descricao  		= $linha["descricao"];
        $this->conteudo  		= $linha["conteudo"];
        $this->slug_produto  	= $linha["slug_produto"];
        $this->ativo_produto  	= $linha["ativo_produto"];
        $this->imagem_produto  	= $linha["imagem_produto"];

        $this->id_venda  	= $linha["id_venda"];
        $this->id_produto  	= $linha["id_produto"];
        $this->valor  		= $linha["valor_item"];
        $this->qtde  		= $linha["qtde"];

    }


    public function totalRegistros($sql){
        $qry = self::executarSQL($sql);
        $total= self::contaDados($qry);


        return $total;
    }
    /*Faz a soma de todas as vendas com o id passado pelo parametro id*/
    public function somaVendas($id){
        $sql = "SELECT SUM(valor_item * qtde) as totalVenda FROM itens_venda WHERE id_venda= '$id'";
        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);

        return $linha["totalVenda"];
    }

    public function verItens($sql,$i){
        $qry = mysql_query($sql);

        //tabela de produto
        $this->id  				= mysql_result($qry,$i,"id_item");
        $this->id_categoria  	= mysql_result($qry,$i,"id_categoria");
        $this->titulo_produto  	= mysql_result($qry,$i,"titulo_produto");
        $this->preco  			= mysql_result($qry,$i,"preco");
        $this->autor  			= mysql_result($qry,$i,"autor");
        $this->duracao  		= mysql_result($qry,$i,"duracao");
        $this->descricao  		= mysql_result($qry,$i,"descricao");
        $this->conteudo  		= mysql_result($qry,$i,"conteudo");
        $this->slug_produto  	= mysql_result($qry,$i,"slug_produto");
        $this->ativo_produto  	= mysql_result($qry,$i,"ativo_produto");
        $this->imagem_produto  	= mysql_result($qry,$i,"imagem_produto");
        //tabela do carrinho
        $this->id_venda  		= mysql_result($qry,$i,"id_venda");
        $this->id_produto  		= mysql_result($qry,$i,"id_produto");
        $this->valor  			= mysql_result($qry,$i,"valor_item");
        $this->qtde  			= mysql_result($qry,$i,"qtde");
    }




}