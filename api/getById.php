<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    include_once 'conection.php';
    include_once 'member.obj.php';

    $database = new Database();
    $db = $database->getConnection();
    
    $member = new Member($db);
    
    $member->id = isset($_GET['id']) ? $_GET['id'] : die();
    $member->GetById();
    
    if($member->name != null){
        $member_arr = array(
            "id" =>  $member->id,
            "name" => $member->name,
            "office" => $member->office,
        ); 
        http_response_code(200);
        echo json_encode($member_arr);
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Membro não cadastrado."));
    }
?>