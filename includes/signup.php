<?php
include('includes/database.php');

if(isset($_POST['signup'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $query = "SELECT * FROM users WHERE email = :email and password = :password and phone = :phone and firstname= :firstname and lastname = :lastname"; 
    $stmt = $db->prepare($query);
    $stmt->execute(
        [
            'email' => $email, 
            'password' => $password, 
            'phone' => $phone, 
            'firstname' => $firstname, 
            'lastname' => $lastname
        ]
    );
}