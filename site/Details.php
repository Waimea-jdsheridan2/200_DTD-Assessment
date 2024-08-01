<?php
require 'lib/utils.php';
include 'partials/top.php';

$sightingCode = $_GET['Code'] ?? '';

$db = connectToDB();
consolelog($db);

$query = 'SELECT * FROM sightings WHERE code =?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$sightingCode]);
    $sighting = $stmt->fetch();
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB Sighting Fetch', ERROR);
    die('There was an error getting sighting data from the database');
}

if ($sighting == false) die('Unknown sighting ' . $sightingCode);
echo $sighting['code'];

$query = 'SELECT * FROM cars WHERE sighting =?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$sightingCode]);
    $Cars = $stmt->fetchAll();
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB Car Fetch', ERROR);
    die('There was an error getting car data from the database');
}

//----------------------------------
echo '<div id="Cars">';
echo   '<h3>Cars</h3>';

if ($cars == false) {
    echo 'None';
}
else {
    echo '<ul id="Car-list">';
    foreach($cars as $car) {
        echo '<li>';
        echo     $car['make'];
        echo     '<br>';
        echo     $car['model'];
        echo     '<br>';
        echo     $car['year'];
        echo     '<br>';
        echo     $car['colour'];
        echo '</li>';
    }
    echo '</ul>';
}