<?php

    header('Acess-Control-Allow-Origin: *');
    header('Acess-Control-Allow-Headers: *');
    header('Acess-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Content-Type: application/json');

    include('../Connection.php');
    include('../model/ModelPessoa.php');
    include('../controller/ControllerPessoa.php');

    $conn = new Connection();
    $model = new ModelPessoa($conn->returnConnection());
    $controller = new ControllerPessoa($model);

    echo json_encode(array("status"=>"Sucess", "data"=>$controller->router()));
    // echo json_encode(["status"=>"Sucess", "data"=>"dados"]);