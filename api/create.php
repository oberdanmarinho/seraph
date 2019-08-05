<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once 'conection.php';
    include_once 'member.obj.php';

    $database = new Database();
    $db = $database->getConnection();

    $member = new member($db); 
    $data = json_decode(file_get_contents("php://input"));
    if(
        !empty($data->name) &&
        !empty($data->office) 
    ){
        $member->name = $data->name;
        $member->office = $data->office;
        if($member->create()){
            http_response_code(201);
            echo json_encode(array("message" => "Membro cadastrado com sucesso."));
        } else {
            http_response_code(503);
            echo json_encode(array("message" => "Não consigo gravar o membro novo."));
        }
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "Dados incompletos."));
    }
?>