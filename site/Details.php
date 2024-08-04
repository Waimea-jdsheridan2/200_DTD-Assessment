<?php
require 'lib/utils.php';
include 'partials/top.php';

$sightingid = $_GET['id'] ?? '';

$db = connectToDB();
consolelog($db);

$query = 'SELECT * FROM sightings WHERE id =?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$sightingid]);
    $sighting = $stmt->fetch();
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB Sighting Fetch', ERROR);
    die('There was an error getting sighting data from the database');
}

if ($sighting == false) die('Unknown sighting ' . $sightingid);
echo $sighting['id'];