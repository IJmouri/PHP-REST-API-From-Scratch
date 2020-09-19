<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/category.php';

$database = new Database();
$db= $database->connect();

$category = new Category($db);

$result = $category->read();

$num = $result->rowCount();

if($num > 0){
    
    $category_arr = array();
    $category_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $category_item = array(
            'id' => $id,
            'name' => $name
        );
        array_push($category_arr['data'], $category_item);
    }

    echo json_encode($category_arr);

}else{
    echo json_encode(
        array('message' => 'No category found')
    );
}


?>