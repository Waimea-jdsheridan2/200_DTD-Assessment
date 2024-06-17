<?php 
require 'lib/utils.php';
include 'partials/top.php';

//connects to database
$db = connectToDB();
consolelog($db);

$query = 'SELECT * FROM Cars';

try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $Cars = $stmt->fetchAll();
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}

consoleLog($Cars);

echo '<ul id="Car-list">';

foreach($Cars as $Car) {
    echo '<li>';
    echo   '<a href="Car.php?id=' . $Car['id'] . '">'; 
    echo     $Car['Make'];
    echo   '</a>';

    echo   '<a href="' . $company['website'] . '">'; 
    echo    '🔗';
    echo   '</a>';
    echo '</li>';
}