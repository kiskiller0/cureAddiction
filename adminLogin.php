<?php
require_once "db.php";
require_once "dbFunctions.php";

session_start();

if (!empty($_POST["username"]) && !empty($_POST["password"])) {
    $admin = getAttribute($conn, 'admin', 'username', $_POST["username"]);

    if ($admin['password'] == $_POST["password"]) {

        $_SESSION["username"] = $_POST["username"];
        $_SESSION["table"] = "admin";
        header ("Location: admin.php");
        

    } else {
        die("wrong password!");
    }

} else {
    die("empty info!");
}