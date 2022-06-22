<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn, "dbCureAddiction");

if ($conn->errno) {
    die("error connecting to db dbCureAddction!");
} 
// else {
//     echo "connected to db!<br>";
// }
