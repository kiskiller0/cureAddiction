<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>
<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "dbFunctions.php";
require_once "db.php";

// front end cheks as well!
if (!isset($_POST["type"])) {
    $needed_values = array("username", "password", "address", "email", "frequency", "drug", "fname", "lname");
    $tableName = "patient";
} else {
    $needed_values = array("username", "password", "address", "email", "telephone");
    $tableName = "doctor";
}

//double checking all form fields
foreach($needed_values as $attr) {
    if (!isset($_POST[$attr]) || empty($_POST[$attr])) {die("<h2 id='warning'>$attr not Found!</h2>");}
}

//checking pre_existing users:
if (getAttribute($conn, $tableName, "username", $_POST["username"])) {
    die("username already in db!");
}

// now, entering the values into the db!
insertTextAttribute($conn, $tableName, $needed_values, $_POST);

header("Location: index.php");