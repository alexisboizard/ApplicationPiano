<?php
ob_start();
session_start();
include('database.php');


if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);

    $collection = $client->ptut->users;
    $user = $collection->findOne([
        'email' => $email,
    ]);

    if($user != NULL){
        $_SESSION['user']['firstname'] = $user['firstname'];
        $_SESSION['user']['email'] = $user['email'];
        $_SESSION['user']['id'] = ((string)$user['_id']);
        header('Location: ../index.php');

    }else{
        $error = "Incorrect email or password";
    }
}

