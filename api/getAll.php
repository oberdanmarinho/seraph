<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once 'conection.php';
    include_once 'member.obj.php';

    $database = new Database();
    $db = $database->getConnection();
 
    $member = new Member($db);
    $stmt = $member->GetAll();
    $num = $stmt->rowCount(); 
    if($num > 0){    
        $member_arr=array();
        $member_arr["records"]=array();    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $member_item = array(
                "id" => $id,
                "name" => $name,
                "office" => $office
            );
            array_push($member_arr["records"], $member_item);
        }
        http_response_code(200);    
        echo json_encode($member_arr);
    } else {
        http_response_code(404);
        echo json_encode(
            array("message" => "Nenhum membro foi encontrado.")
        );
    }
        