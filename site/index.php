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
    echo   '<a href="Sighting.php?code=' . $sighting['code'] . '">'; 
    echo     $sighting['car_id'];
    echo     $sighting['date']; 
    echo     $sighting['location'];
    echo   '<a href="details.php?' . $sighting['details'] . '">';
    echo    'Details';
    echo   '</a>';
    echo '</li>';
}

echo '</ul>';

echo '<div id="add-button">
        <a href="Form-Sighting.php">
            Add
        </a>
     </div>';

     echo '<div id="watchlist-button">
     <a href="Watchlist.php">
         Watchlist
     </a>
  </div>';

 include 'partials/bottom.php'; 
 ?>