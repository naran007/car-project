<?php
require 'vendor/autoload.php'; // Include Composer autoloader

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->car_booking->requests;

$bookings = $collection->find();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin - Booking Requests</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background: #f7f7f7;
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 12px 15px;
      border: 1px solid #ccc;
      text-align: left;
    }
    th {
      background-color: #333;
      color: #fff;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    .note {
      margin-top: 10px;
      font-size: 0.9em;
      color: #888;
    }
  </style>
</head>
<body>
  <h2>📋 All Car Booking Requests</h2>
  <table>
    <thead>
      <tr>
        <th>Full Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Car</th>
        <th>Date</th>
        <th>Message</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($bookings as $booking): ?>
        <tr>
          <td><?= htmlspecialchars($booking['name']) ?></td>
          <td><?= htmlspecialchars($booking['phone']) ?></td>
          <td><?= htmlspecialchars($booking['email']) ?></td>
          <td><?= htmlspecialchars($booking['car']) ?></td>
          <td><?= htmlspecialchars($booking['date']) ?></td>
          <td><?= nl2br(htmlspecialchars($booking['message'])) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <p class="note">Only accessible to authorized personnel. 🔒</p>
</body>
</html>
