<?php
require 'lib/utils.php';
include 'partials/top.php';

$SightingCode = $_GET['Code'] ?? '';

$db = connectToDB();
consolelog($db);

$query = 'SELECT * FROM Sightings WHERE Code =?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$SightingCode]);
    $Sighting = $stmt->fetch();
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB Sighting Fetch', ERROR);
    die('There was an error getting sighting data from the database');
}

if ($Sighting == false) die('Unknown sighting: ' . $SightingCode);
echo $Sighting['Code'];

$query = 'SELECT * FROM Cars WHERE Sighting =?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$SightingCode]);
    $Cars = $stmt->fetchAll();
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB Car Fetch', ERROR);
    die('There was an error getting car data from the database');
}

//----------------------------------
echo '<div id="Cars">';
echo   '<h3>Cars</h3>';

if ($Cars == false) {
    echo 'None';
}
else {
    echo '<ul id="Car-list">';
    foreach($Cars as $Car) {
        echo '<li>';
        echo     $Car['Make'];
        echo     '<br>';
        echo     $game['Model'];
        echo     '<br>';
        echo     $game['Year'];
        echo     '<br>';
        echo     $game['Colour'];
        echo '</li>';
    }
    echo '</ul>';
}