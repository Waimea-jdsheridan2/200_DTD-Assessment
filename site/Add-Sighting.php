<?php 
require 'lib/utils.php';
include 'partials/top.php';

echo '<h1>Adding Sighting to Database...</h1>';

consolelog($_POST, 'POST Data');

$car_id    = $_POST['id'];
$date      = $_POST['date'];
$location  = $_POST['location'];
$details  = $_POST['details'];


echo '<p>Car id: '      . $car_id;
echo '<p>Date: '        . $date;
echo '<p>Location: '    . $location;
echo '<p>Details: '    . $details;

$db = connectToDB();

$query = 'INSERT INTO sightings 
          (car_id, date, location, details)
          VALUES (?,?,?,?)';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$car_id, $date, $location, $details]);
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB Sighting Add', ERROR);
    die('There was an error adding data to the database');
}

echo '<p>Success!!!</p>';

 include 'partials/bottom.php';
 ?>
