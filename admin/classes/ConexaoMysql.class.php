<?php

/**
 * Class conexaoMysql classe para conexão do banco de dados
 */
class conexaoMysql{
    protected $servidor;
    protected $usuario;
    protected $senha;
    protected $banco;
    protected $conexao;
    protected $dados;
    protected $qry;
    protected $totalDados;

    public function __construct(){
        $this->servidor = "localhost";
        $this->usuario = "root";
        $this->senha = "";
        $this->banco = "lojavirtual";
        $this->conectar();
    }

    /**
     * Faz a conexão com o banco de dados utilizando o mysql_connect e os dados servidor, usuario e senha que são vaiaveis dessa classe
     *
     */
    function conectar(){
        $this->conexao = @mysql_connect($this->servidor, $this->usuario, $this->senha) or
            die ("Não foi possível conectar com o servidor de banco de dados: ".mysql_error());

        $this->banco = @mysql_select_db($this->banco) or
            die ("Não foi possível conectar com o banco de dados: ".mysql_error());    }

    /**
     * Meto para executar qualquer tipo de sql
     * @param $sql
     * @return bool
     */
    function executarSQL($sql){
        $this->qry = @mysql_query($sql) or die ("Erro ao executar o comando SQL: $sql <br>".mysql_error());
        return $this->qry;
    }

    /**
     * Lista os dados passados pela query e retorna um array com os valores retornados
     * @param $qry - um sql query
     * @return array
     */
    function listar($qry){
        $this->dados = @mysql_fetch_array($qry);
        return $this->dados;
    }

    /**
     * Conta quantos elementos existem na query passada
     * @param $qry
     * @return int
     */
    function contaDados($qry){
        $this->totalDados = mysql_num_rows($qry);
        return $this->totalDados;

    }

}