<?php
    include('./Connection.php');
    include('./model/ModelPessoa.php');

    $conn = new Connection();
    // echo '<pre>';
    // var_dump($conn->returnConnection());
    // echo '</pre>';

    $modelPessoa = new ModelPessoa($conn->returnConnection());

    $dados = $modelPessoa->findAll();

    echo json_encode($dados);
    // var_dump($dados);
?>