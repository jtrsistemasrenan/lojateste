<?php
/**
 * Created by PhpStorm.
 * User: Legolas
 * Date: 30/10/14
 * Time: 12:53
 */
include_once "ConexaoMysql.class.php";
class manipulacaoDeDados extends ConexaoMysql {
    protected $sql;
    protected $tabela;
    protected $campos;
    protected $dados;
    protected $msg;
    protected $valorNaTabela;
    protected $valorPesquisa;

    public function setValorNaTabela($val){
        $this->valorNaTabela = $val;
    }

    public function setValorPesquisa($val){
        $this->valorPesquisa = $val;
    }

    public function setTabela($tbl){
        $this->tabela = $tbl;
    }

    public function setCampos($campos){
        $this->campos = $campos;
    }

    public function setDados($dados){
        $this->dados = $dados;
    }

    public function getMsg(){
        return $this->msg;
    }

    public function inserir(){
        $this->sql = "INSERT INTO $this->tabela ($this->campos) VALUES ($this->dados)";
        if(self::executarSQL($this->sql)){
            $this->msg = "Registro cadastro com sucesso";
        };
    }

    public function remover(){
        $this->sql = "DELETE FROM $this->tabela WHERE $this->valorNaTabela = $this->valorPesquisa";
        if(self::executarSQL($this->sql)){
            $this->msg = "Registro excluido com sucesso...";
        }
    }

    public function excluir($id_pedido,$id_produto){
        $this->sql = "DELETE FROM $this->tabela WHERE id_pedido = $id_pedido and id_produto = $id_produto";
        if(self::executarSQL($this->sql)){
            $this->msg = "Registro excluido com sucesso...";
        }
    }

    public function alterar (){
        $this->sql = "update $this->tabela set $this->campos where $this->valorNaTabela = $this->valorPesquisa";

        if(self::executarSQL($this->sql)){
            $this->msg=" Registro alterado com sucesso!";
        }
    }

    /**
     * Pega o ultimo elemento da tabela
     * @param $campo
     * @param $tabela
     */
    public function ultimoRegistro($campo,$tabela){

        $sql = "SELECT $campo FROM $tabela ORDER  BY $campo DESC LIMIT 1" ;

        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);

        return $linha[$campo];

    }
} 