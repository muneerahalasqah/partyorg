<?php
$username="root";
$pass="";
$server="localhost";
$database="partyorg";

$db = mysqli_connect($server,$username,$pass,$database) or die('Could not connect to the database');
?>