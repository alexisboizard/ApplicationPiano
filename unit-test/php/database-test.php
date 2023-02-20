<?php
    // TEST LIST:

    //     insert user
    //     insert user with existing email
    //     insert user with no password
    //     insert user with phone number contain anything other number

    //     insert replay
    //     insert replay without data
    //     insert replay whithout name
    //     insert replay whithout userID

    //     get user replay

    //     max number seance per user into db

require_once(__DIR__ . '/../../includes/database.php');

function insert_user_test($collection){

    $user_info = [
        "name" => "DUPONT",
        "firstname" => "Bob",
        "password" => password_hash("1234",PASSWORD_DEFAULT),
        "email" => "bob@dupont.fr",
        "phone" => "0000000000"
    ];
    
    signup($collection, $user_info);

    echo "USER INSERTION TEST ";

    $result = $collection->findOne([
        "firstname" => "Bob",
        "name" => "DUPONT",
        "email" => "bob@dupont.fr",
        "phone" => "0000000000",
    ]);


    if($result != NULL && password_verify("1234",$result["password"])){
        print("DONE");
    }else{
        print("FAILED");
    }
}

insert_user_test($collection_users);
