<?php
include("database.php");

if(isset($_GET) && isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $db->prepare("SELECT * FROM replay where userId = :id and id = :idvideo");
    $stmt->execute(
        [
            'idvideo' => $id,
            'id' => $_SESSION['user']['id']
        ]
    );
    
    $result = $stmt->fetch();
    header('Content-type: video/mp4');
    echo $result["data"];

}