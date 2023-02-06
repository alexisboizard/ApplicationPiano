<?php
require __DIR__ . '/../vendor/autoload.php'; // include Composer's autoloader

$client = new MongoDB\Client(
    'mongodb://localhost:27017/'
);

