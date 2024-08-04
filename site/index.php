<?php 
require 'lib/utils.php';
include 'partials/top.php';

echo '<h2>Sighted Cars</h2>';

$db = connectToDB();
consolelog($db);

$query = 'SELECT * FROM sightings';

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

echo '<ul id="Sighting-list">';

foreach($sightings as $sighting) {
    echo '<li>';
    echo     $sighting['car_id'];
    echo     $sighting['date'];
    echo     $sighting['location'];
    echo '<a class="name" href="delete-sighting.php?id=' . $sighting['id'] . '">🗑</a>';
    echo   '<a href="details.php?' . $sighting['details'] . '">';
    echo    'Details';
    echo   '</a>';
    echo '</li>';
}

echo '</ul>';

echo '<div id="add-button-sighting">
        <a href="form-sighting.php">
            Add Sighting
        </a>
     </div>';

echo '<div id="watchlist-button">
        <a href="watchlist.php">
            Watchlist
        </a>
    </div>';

 include 'partials/bottom.php'; 
 ?>