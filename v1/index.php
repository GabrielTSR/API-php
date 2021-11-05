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

        case 'readID':
            $cod_pessoa = $_REQUEST['cod_pessoa'];
            readID($cod_pessoa, $conn);
            break;

        case 'create':
            $nome = $_REQUEST['nome'];
            $sobrenome = $_REQUEST['sobrenome'];
            $email = $_REQUEST['email'];
            $celular = $_REQUEST['celular'];
            $fotografia = $_REQUEST['fotografia'];

            create($nome, $sobrenome, $email, $celular, $fotografia, $conn);
            break;

        case 'update':
            $cod_pessoa = $_REQUEST['cod_pessoa'];
            $nome = $_REQUEST['nome'];
            $sobrenome = $_REQUEST['sobrenome'];
            $email = $_REQUEST['email'];
            $celular = $_REQUEST['celular'];
            $fotografia = $_REQUEST['fotografia'];

            update($cod_pessoa, $nome, $sobrenome, $email, $celular, $fotografia, $conn);
            break;

        case 'delete':
            $cod_pessoa = $_REQUEST['cod_pessoa'];

            delete($cod_pessoa, $conn);
            break;
        
        default:
            # code...
            break;
    }
?>