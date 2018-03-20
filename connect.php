<?php
$username="root";
$pass="";
$server="localhost";
$db="partyorg";

$db = mysqli_connect($server,$username,$pass,$db) or die('Could not connect to the database');
?>