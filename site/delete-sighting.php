<?php
require 'lib/utils.php';

$sightingid = $_GET['id'] ?? '';

$db = connectToDB();

$query = 'DELETE FROM sightings WHERE id =?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$sightingid]); 
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB Delete Fetch', ERROR);
    die('There was an error deleting sighting in the database');
}

header('location: index.php');

?>