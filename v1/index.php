<?php
    header('Acess-Control-Allow-Origin: *');
    header('Acess-Control-Allow-Headers: *');
    header('Acess-Control-Allow-Methods: GET, POST');
    header('Content-Type: application/json');

    include('./connection.php');
    include('./crud.php');

    # CRIAÇÃO DAS ROTAS

    switch ($_REQUEST['acao']) {
        case 'read':
            read($conn);
            break;

        case 'create':
            $nome = $_REQUEST['nome'];
            $sobrenome = $_REQUEST['sobrenome'];
            $email = $_REQUEST['email'];
            $celular = $_REQUEST['celular'];
            $fotografia = $_REQUEST['fotografia'];

            create($nome, $sobrenome, $email, $celular, $fotografia, $conn);
            break;
        
        default:
            # code...
            break;
    }
?>