<?php
include('database.php');

$user_info = [
    "firstname" => $_POST['firstname'],
    "name" => $_POST['name'],
    "email" => $_POST['email'],
    "password" => password_hash($_POST['password'],PASSWORD_DEFAULT),
    "phone" => $_POST['phone']
];

signup($collection_users,$user_info);
