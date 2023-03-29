<?php
session_start();
include("database.php");

function genererChaineAleatoire($longueur = 10)
{
 $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $longueurMax = strlen($caracteres);
 $chaineAleatoire = '';
 for ($i = 0; $i < $longueur; $i++)
 {
 $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
 }
 return $chaineAleatoire;
}

$data = new MongoDB\BSON\Binary(file_get_contents('php://input'), MongoDB\BSON\Binary::TYPE_GENERIC);
$name = time() . "-" .genererChaineAleatoire(10) . ".mp4";

$collection = $client->ptut->replay;

if(isset($_SESSION)){
    $collection->insertOne([
        'name' => $name,
        'data' => $data,
        'userId' => $_SESSION["user"]["id"],
        'date' => date_create()->format('Y-m-d H:i:s')
    ]);
}