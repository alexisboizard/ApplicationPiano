<?php
seesion_start();
include('includes/database.php');

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stmt = $db->prepare($sql);
    $stmt->execute(['email' => $email, 'password' => $password]);
    $user = $stmt->fetch();

    if($user){
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $db->prepare($sql);
        $stmt->execute(
            [
                'email' => $email, 
                'password' => $password
            ]
        );
        $user = $stmt->fetch();
        $_SESSION['user']['firstname'] = $user['firstname'];
        $_SESSION['user']['email'] = $user['email'];
        $_SESSION['user']['id'] = $user['id'];
        header('Location: index.php');
    }else{
        $error = "Incorrect email or password";
    }
}