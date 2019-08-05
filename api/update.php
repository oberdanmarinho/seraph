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
    // Enviou um json
    $data = json_decode(file_get_contents("php://input"));
    
    $member->id = $data->id;
    
    // set member property values
    $member->name = $data->name;
    $member->office = $data->office;
    
    if($member->update()){ 
        http_response_code(200);
        echo json_encode(array("message" => "Membro atualizado com sucesso."));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Não consigo atualizar o membro."));
    }
?>