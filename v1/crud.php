<?php

#IMOPORTAÇÃO DO ARQUIVO DE CONEXÃO
include('./connection.php');

# FUNÇÃO DE LEITURA DE DADOS (SEM CRITÉRIOS)
function read($conn){
    $sql = "SELECT * FROM tbl_pessoa";

    if ($resultado = mysqli_query($conn, $sql)) {
        
        $dados = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

        echo json_encode(['status'=>'sucess', 'data'=>$dados]);

    } else {
        echo json_encode(['status'=>'error', 'data'=>mysqli_error($conn)]);
    }
}

#FUNÇÃO DE INSERÇÃO
function create($nome, $sobrenome, $email, $celular, $fotografia, $conn){
    $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular, fotografia)
            VALUES ('$nome', '$sobrenome', '$email', '$celular', '$fotografia')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array('status'=>'sucess', 'data'=>'Dados inseridos com sucesso'));
    } else {
        echo json_encode(array('status'=>'error', 'data'=>'Erro ao inserir os dados'));
    }
}

?>