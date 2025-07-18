<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.html");
    exit();
}

require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->carWebsite->bookings;
$bookings = $collection->find();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        .booking {
            background: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
        }
        .logout-btn {
            display: block;
            margin: 0 auto 20px;
            padding: 10px 20px;
            background: #c0392b;
            color: white;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            text-align: center;
        }
        .logout-btn:hover {
            background: #e74c3c;
        }
    </style>
</head>
<body>
    <a href="logout.php" class="logout-btn">Logout</a>
    <h2>📋 Booking Requests</h2>

    <?php foreach ($bookings as $booking): ?>
        <div class="booking">
            <strong>Name:</strong> <?= htmlspecialchars($booking['name']) ?><br>
            <strong>Phone:</strong> <?= htmlspecialchars($booking['phone']) ?><br>
            <strong>Email:</strong> <?= htmlspecialchars($booking['email']) ?><br>
            <strong>Car:</strong> <?= htmlspecialchars($booking['car']) ?><br>
            <strong>Date:</strong> <?= htmlspecialchars($booking['date']) ?><br>
            <strong>Message:</strong> <?= nl2br(htmlspecialchars($booking['message'] ?? '')) ?><br>
        </div>
    <?php endforeach; ?>
</body>
</html>
