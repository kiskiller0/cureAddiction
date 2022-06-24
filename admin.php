<?php
require_once "db.php";
require_once "dbFunctions.php";

session_start();

if (!empty($_SESSION["username"]) && !empty($_SESSION["table"])) {
    if ($_SESSION["table"] == 'admin') {

        $sqlPatients = "select * from patient;";
        $sqlDoctors = "select * from doctor;";

        $pQuery = mysqli_query($conn, $sqlPatients);
        $dQuery = mysqli_query($conn, $sqlDoctors);

        echo "hello sir " . $_SESSION["username"] . "<br>click the username of the user whom you want to delete:<br>";
        // printing a list of patients:
        echo "<br>patients:<br>";
        echo "<form action=\"deletePatient.php\">";

        while ($p = mysqli_fetch_assoc($pQuery)) {
            echo "<input type=\"submit\" value=\"". $p["username"] ."\">";
        }

        echo "</form>";

        // printing a list of doctors:
        echo "<br>doctors:<br>";
        echo "<form action=\"deleteDoctors.php\">";

        while ($d = mysqli_fetch_assoc($dQuery)) {
            echo "<input type=\"submit\" value=\"". $d["username"] ."\">";
        }

        echo "</form>";

        echo "<a href=\"logout.php\">Log Out!</a>";

    } else {
        header('Location: html/adminLogin.html');
        die();
    }
} else {
    header('Location: html/adminLogin.html');
    die();
}