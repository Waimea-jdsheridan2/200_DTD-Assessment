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

<h2>New Car</h2>

<form method="post" action="add-car.php">

    <label>Make</label>
    <input name="make" 
           type="text"
           placeholder="e.g. Subaru" 
           required>

    <label>Model</label>
    <input name="model" 
           type="text" 
           placeholder="e.g. WRX" 
           required>

    <label>Colour</label>
    <input name="colour"
           type="text"
           placeholder="e.g. Blue" 
           required>

    <label>Year</label>
    <input name="year"
           type="text"
           placeholder="e.g. 2005" 
           required>

    <label>HMO</label>
    <input name="hmo"
           type="text"
           placeholder="e.g. 1" 
           required>

    <label>Km</label>
    <input name="kilometers"
           type="text"
           placeholder="e.g. 5,000" 
           required>

    <label>Condition</label>
    <input name="condition"
           type="text"
           placeholder="e.g. Good" 
           required>

    <input type="submit" 
           value= "Add">

</form>