<?php
include('database.php');
    $firstname = $_POST['firstname'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);

    $collection = $client->ptut->users;
    $checkUserExist = $collection->findOne([
        'email' => $firstname,
    ]);

    if($checkUserExist != NULL){
        $error = "User already exists";
        echo $error;
    }else{
        $collection->insertOne([
            'firstname' => $firstname,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => $hashedPassword
        ]);
        header('Location: /login.php');
        exit();
        
    }
