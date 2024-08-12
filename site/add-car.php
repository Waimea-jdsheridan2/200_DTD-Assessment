<?php 
require 'lib/utils.php';
include 'partials/top.php';

echo '<h1>Adding Car to Database...</h1>';

consolelog($_POST, 'POST Data');

$make        = $_POST['make'];
$model       = $_POST['model'];
$colour      = $_POST['colour'];
$year        = $_POST['year'];
$hmo         = $_POST['hmo'];
$kilometers  = $_POST['kilometers'];
$condition   = $_POST['condition'];

echo '<p>make: '          . $make;
echo '<p>model: '         . $model;
echo '<p>colour: '        . $colour;
echo '<p>year: '          . $year;
echo '<p>hmo: '           . $hmo;
echo '<p>kilometers: '    . $kilometers;
echo '<p>condition: '     . $condition;

$db = connectToDB();

$query = 'INSERT INTO cars 
          (make, model, colour, year, hmo, kilometers, condition)
          VALUES (?,?,?,?,?,?,?)';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$make, $model, $colour, $year, $hmo, $kilometers, $condition]);
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB Car Add', ERROR);
    die('There was an error adding data to the database');
}

echo '<p>Success!!!</p>';

 include 'partials/bottom.php';
 ?>