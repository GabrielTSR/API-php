<?php

class ModelPessoa{

    private $_conn;
    private $_codPessoa;
    private $_nome;
    private $_sobrenome;
    private $_email;
    private $_celular;
    private $_fotografia;

    public function __construct($conn){

        //PERMITE RECEBER DADOS JSON ATRAVÉS DA REQUISIÇÃO.
        $json = file_get_contents("php://input");
        $dadosPessoa = json_decode($json);

        //RECEBIMENTO DOS DADOS DO POSTMAN
        $this->_codPessoa = $dadosPessoa->cod_pessoa ?? null;
        $this->_nome = $dadosPessoa->nome ?? null;
        $this->_sobrenome = $dadosPessoa->sobrenome ?? null;
        $this->_email = $dadosPessoa->email ?? null;
        $this->_celular = $dadosPessoa->celular ?? null;
        $this->_fotografia = $dadosPessoa->fotografia ?? null;

        $this->_conn = $conn;
    }

    public function findAll(){
        //Monta a instrução SQL
        $sql = "SELECT * FROM tbl_pessoa";

        //Prepara um processo de execução de instrução SQL
        $stm = $this->_conn->prepare($sql);
        //Executa instrução sql
        $stm->execute();

        //Devolve os valores da select para serem utilizados
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(){

        $sql = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = ?";
        $stm = $this->_conn->prepare($sql);
        $stm->bindValue(1, $this->_codPessoa);
        $stm->execute();

        return $stm->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function create(){
        $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular, fotografia)
                VALUES (?, ?, ?, ?, ?)";

        $stm = $this->_conn->prepare($sql);

        $stm->bindValue(1, $this->_nome);
        $stm->bindValue(2, $this->_sobrenome);
        $stm->bindValue(3, $this->_email);
        $stm->bindValue(4, $this->_celular);
        $stm->bindValue(5, $this->_fotografia);

        if ($stm->execute()){
            return "Sucelso";
        } else {
            return "Erro";
        }
    }

}

?>