<?php
require_once "db.php";
require_once "dbFunctions.php";

session_start();
// echo $_POST["username"];

if (!empty($_SESSION["username"]) && !empty($_SESSION["table"])) {
    if ($_SESSION["table"] == 'admin') {
        if (empty($_POST["username"])) {
            die ("field empty! quit tampering!");
        } else {
            $idPatient = getAttribute($conn, 'patient', 'username', $_POST["username"])["id"];
            $sql = "delete from association where id_patient = '$idPatient'";
            mysqli_query($conn, $sql);
            $sql = "delete from patient where username = '" . $_POST["username"] . "';";
            echo $sql;
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo ("associations deleted!");
                sleep(2);
                header('Location: admin.php');
            }
        }
    }
}

