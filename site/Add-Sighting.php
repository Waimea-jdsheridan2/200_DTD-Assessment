<?php 
require 'lib/utils.php';
include 'partials/top.php';


echo '<h1>Adding Sighting to Database...</h1>';

consolelog($_POST, 'POST Data');

$code     = strtoupper($_POST['code']);
$car_id   = $_POST['car_id'];
$date     = $_POST['date'];
$location = $_POST['location'];

echo '<p>Code: '       . $code;
echo '<p>Car_id: '     . $car_id;
echo '<p>Date: '       . $date;
echo '<p>Location: '   . $location;

$db = connectToDB();

$query = 'INSERT INTO Sightings 
          (code, car_id, date, location)
          VALUES (?,?,?,?)';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$code, $car_id, $date, $location]);
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB Sighting Add', ERROR);
    die('There was an error adding data to the database');
}

echo '<p>Success!!!</p>';

 include 'partials/bottom.php';
 
?>