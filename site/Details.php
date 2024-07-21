<?php
require 'lib/utils.php';
include 'partials/top.php';

$id = $_GET['id'] ?? '';

$db = connectToDB();
consolelog($db);

$query = 'SELECT * FROM Cars WHERE id =?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $Car = $stmt->fetch();
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB Car Fetch', ERROR);
    die('There was an error getting car data from the database');
}

if ($Car == false) die('Unknown Car: ' . $id);
echo $Car['id'];

$query = 'SELECT * FROM Cars WHERE Sighting =?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$SightingCode]);
    $Car = $stmt->fetchAll(); 
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB Car Fetch', ERROR);
    die('There was an error getting car data from the database');
}

echo '<div id="cars">';
echo   '<h3>Cars</h3>';

if ($Cars == false) {
     echo 'None';
}
else {
    echo '<ul id="car-list">';
    foreach($Cars as $Car) {
        echo '<li>';
        echo     $Car['make'];
        echo     '<br>';
        echo     $Car['model'];
        echo '</li>';
    }
    echo '</ul>';
}