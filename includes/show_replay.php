<?php
include("database.php");

$collection = $client->ptut->replay;

if(isset($_GET) && isset($_GET['id'])){
    $id = new MongoDB\BSON\ObjectId($_GET['id']);
    
    $result = $collection->findOne([
        '_id' => $id
    ]);


    header('Content-type: video/mp4');
    echo $result["data"]->getData();
}