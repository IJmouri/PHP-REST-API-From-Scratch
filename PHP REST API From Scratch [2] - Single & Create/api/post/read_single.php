<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/post.php';

$database = new Database();
$db= $database->connect();

$post = new Post($db);

$post->id = isset($_GET['id']) ? $_GET['id'] : die();

$post -> read_single();

$post_arr = array(
    'id' => $post->id,
    'title' => $post->title,
    'body' => $post->body,
    'author' => $post->author,
    'category_id' => $post->category_id,
    'categories_name' => $post->categories_name
);
print_r(json_encode($post_arr));


?>