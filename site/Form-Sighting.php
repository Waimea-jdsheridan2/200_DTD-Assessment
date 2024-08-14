<?php 
require 'lib/utils.php';
include 'partials/top.php';

$db = connectToDB();

$query = 'SELECT * FROM cars';

try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $cars = $stmt->fetchAll();
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}
?>

<h2>New Sighting</h2>

<form method="post" action="add-sighting.php">

    <label>Car</label>
    <select name="id" required>
<?php

foreach($cars as $car) {
    echo '<option value="' . $car['id'] . '">';
    echo $car['make'] . ' ' . $car['model'];
    echo '</option>';
}

?>
    </select>

    <label>Date</label>
    <input name="date" 
           type="date" 
           required>

    <label>Location</label>
    <input name="location" 
           type="text" 
           placeholder="e.g. Richmond" 
           required>

    <input type="submit" 
           value= "Add">

</form>

<?php
include 'partials/bottom.php';
?>