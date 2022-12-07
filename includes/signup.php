<?php
include('database.php');
    $firstname = $_POST['firstname'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $query = "SELECT * FROM users WHERE email = :email and password = :password and phone = :phone and firstname= :firstname and name = :name"; 
    $stmt = $db->prepare($query);
    $stmt->execute(
        [
            'email' => $email, 
            'password' => $password, 
            'phone' => $phone, 
            'firstname' => $firstname, 
            'name' => $name
        ]
    );
    $user = $stmt->fetch();
    if($user){
        $error = "User already exists";
        echo $error;
    }else{
        $sql = "INSERT INTO users (firstname, name, email, password, phone) VALUES (:firstname, :name, :email, :password, :phone)";
        $stmt = $db->prepare($sql);
        $stmt->execute(
            [
                'firstname' => $firstname, 
                'name' => $name, 
                'email' => $email, 
                'password' => $password, 
                'phone' => $phone
            ]
        );
        header('Location: /login.php');
        exit();
        
    }
