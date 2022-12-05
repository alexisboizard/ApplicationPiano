<?php

include('includes/database.php');

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $db->prepare($sql);
    $stmt->execute(['username' => $username, 'password' => $password]);
    $user = $stmt->fetch();

    if($user){
        $_SESSION['user_id'] = $user['id'];
        header('Location: index.php');
    }else{
        $error = "Incorrect username or password";
    }
}