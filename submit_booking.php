<?php
require 'vendor/autoload.php';

use MongoDB\Client;
use Dotenv\Dotenv;

// Load environment variables from .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $car = $_POST['car_model'] ?? ''; // or $_POST['car'] if your input is named 'car'
    $date = $_POST['preferred_date'] ?? ''; // or $_POST['date']
    $message = $_POST['message'] ?? '';

    // Connect to MongoDB
    $client = new Client($_ENV['MONGO_URL']);
    $collection = $client->dreamcarproject->bookings;

    // Insert booking data
    $collection->insertOne([
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'car' => $car,
        'date' => $date,
        'message' => $message,
        'submitted_at' => new MongoDB\BSON\UTCDateTime()
    ]);

    // Redirect after successful insert
    header("Location: thankyou.html");
    exit();
} else {
    echo "Invalid request.";
}
?>
