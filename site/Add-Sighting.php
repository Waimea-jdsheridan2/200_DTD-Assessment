<?php 
require 'lib/utils.php';
include 'partials/top.php';


echo '<h1>Adding Sighting to Database...</h1>';

consolelog($_POST, 'POST Data');

$Code     = strtoupper($_POST['code']);
$Car_id   = $_POST['Car_id'];
$Date     = $_POST['Date'];
$Location = $_POST['Location'];

echo '<p>Code: '       . $Code;
echo '<p>Car_id: '     . $Car_id;
echo '<p>Date: '       . $Date;
echo '<p>Location: '   . $Location;

$db = connectToDB();

$query = 'INSERT INTO Sightings 
          (Code, Car_id, Date, Location)
          VALUES (?,?,?,?)';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$Code, $Car_id, $Date, $Location]);
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB Sighting Add', ERROR);
    die('There was an error adding data to the database');
}

echo '<p>Success!!!</p>';

 include 'partials/bottom.php';
 
 ?>