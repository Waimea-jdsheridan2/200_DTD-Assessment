<?php 
require 'lib/utils.php';
include 'partials/top.php';

echo '<h2>Sighted Cars</h2>';

$db = connectToDB();
consolelog($db);

$query = 'SELECT * FROM Sightings';

try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $Sightings = $stmt->fetchAll();
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}

consoleLog($Sightings);

echo '<ul id="Sighting-list">';

foreach($Sightings as $Sighting) {
    echo '<li>';
    echo   '<a href="Sighting.php?code=' . $Sighting['Code'] . '">'; 
    echo     $Sighting['Car.id'];
    echo     $Sighting['Date_time'];
    echo     $Sighting['Location'];
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