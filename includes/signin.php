<?php
ob_start();
session_start();
include('database.php');


if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
    var_dump($hashedPassword);


    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if($user){
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $db->prepare($sql);
        $stmt->execute(
            [
                'email' => $email, 
            ]
        );
        $user = $stmt->fetch();
        if(password_verify($password,$user['password'])){
            $_SESSION['user']['firstname'] = $user['firstname'];
            $_SESSION['user']['email'] = $user['email'];
            $_SESSION['user']['id'] = $user['ID'];
            header('Location: ../index.php');
            ob_end_flush();
        }else{
            $error = "Incorrect email or password";
        }
    }
}

