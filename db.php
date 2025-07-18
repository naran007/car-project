<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new MongoDB\Client($_ENV["MONGO_URL"]);
$collection = $client->dreamcarproject->bookings;
?>
