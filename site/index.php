<?php 
require 'lib/utils.php';
include 'partials/top.php';

echo '<h2>Sighted Cars</h2>';

$db = connectToDB();
consolelog($db);

$query = 'SELECT sightings.id AS sid,
                 sightings.date,
                 sightings.location,
                 cars.year,
                 cars.make,
                 cars.model
            FROM sightings
            JOIN cars ON sightings.car_id = cars.id
            ORDER BY sightings.date DESC';

try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $sightings = $stmt->fetchAll();
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}

consoleLog($sightings);

echo '<ul id="sighting-list">';

foreach($sightings as $sighting) {
    echo '<li>';
    echo     '<p class="car">'. $sighting['year'] . ' '. $sighting['make'] . ' '. $sighting['model'] . '</p>';
    echo     '<p>';
    echo       '<span class="date">'. $sighting['date'] . '</span>';
    echo       '<span class="location">'. $sighting['location'] . '</span>';
    echo       '<a class="name" href="delete-sighting.php?id=' . $sighting['sid'] . '">🗑</a>';
    echo       '</a>';
    echo    '</p>';
    echo '</li>';
}

echo '</ul>';

echo '<div id="add-button-sighting">
        <a href="form-sighting.php">
            Add Sighting
        </a>
     </div>';

echo '<div id="add-button-car">
        <a href="form-car.php">
            Add Car
        </a>
     </div>';

 include 'partials/bottom.php'; 
 ?>