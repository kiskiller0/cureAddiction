<?php
require_once "db.php";
require_once "dbFunctions.php";


$un = $_POST['un'];
$pass = $_POST['pass'];

getAttribute($conn, "admin", "username", $un);

