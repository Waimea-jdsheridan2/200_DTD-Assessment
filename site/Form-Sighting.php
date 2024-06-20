<?php 
require 'lib/utils.php';
include 'partials/top.php';
?>

<h2>New Sighting</h2>

<form method="post" action="Add-Sighting.php">

    <label>Code</label>
    <input name="code"
           type="text"
           placeholder="e.g. A"
           minlength="1"
           maxlength="1"
           pattern="[A-Z]"
           required>

    <label>Car Id</label>
    <input name="name"
           type="number"
           placeholder="e.g. 1"
           required>

    <label>Date</label>
    <input name="name" 
           type="text" 
           placeholder="8 September, 2015" 
           required>

    <label>Location</label>
    <input name="Location" 
           type="url" 
           placeholder="e.g. Richmond" 
           required>

    <input type="submit" 
           value= "Add">

</form>




<?php
include 'partials/bottom.php';
?>