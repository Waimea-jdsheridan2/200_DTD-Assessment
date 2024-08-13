<?php
require 'lib/utils.php';
include 'partials/top.php';

$carId = $_GET['id'] ?? '';

$db = connectToDB();
consolelog($db);

$query = 'SELECT * FROM cars WHERE id =?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$carId]);  //Pass in the data
    $car = $stmt->fetch();  // Only be one result
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB Detail Fetch', ERROR);
    die('There was an error getting detail data from the database');
}