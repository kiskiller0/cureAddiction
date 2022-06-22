<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in!</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

</body>

</html>

<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start(); // this is crucial to retrieve session info!

require_once "db.php";
require_once "dbFunctions.php";

if (isset($_POST["type"])) {
    $tableName = "doctor";
} else {
    $tableName = "patient";
}
echo $tableName;

if (isset($_SESSION["username"])) {
    if ($_SESSION["table"] == $tableName); {
        header("Location: index.php");
        die();
    }
}

echo "not saved!";
if (getAttribute($conn, $tableName, "username", $_POST["username"])) {
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["table"] = $tableName;
    header("Location: index.php");
    die();
} else {
    die("user not indb!");
}
