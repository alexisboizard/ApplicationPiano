<?php
session_start();
include("database.php");

var_dump($_POST);

if(isset($_POST)){
    $statment = $db->prepare("INSERT INTO replay values(:id,:name,:data,:userId)");
    $statment->execute([
        "id" => "NULL",
        "name" => $_POST['name'],
        "data" => $_POST['data'],
        "userId" => $_SESSION["user"]["id"]
    ]);
}