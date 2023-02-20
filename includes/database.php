<?php
require_once __DIR__ . '/../vendor/autoload.php'; // include Composer's autoloader

$client = new MongoDB\Client(
    'mongodb://localhost:27017/'
);

$collection_replay = $client->ptut->replay;
$collection_users = $client->ptut->users;


function signup($collection, $user_info){

    $checkUserExist = $collection->findOne([
        'email' => $user_info["email"],
    ]);

    if($checkUserExist != NULL){
        $error = "User already exists";
        echo $error;
    }else{
        $collection->insertOne([
            'firstname' => $user_info["firstname"],
            'name' => $user_info["name"],
            'email' => $user_info["email"],
            'phone' => $user_info["phone"],
            'password' => $user_info["password"]
        ]);
        header('Location: /login.php');
        exit();
        
    }
}