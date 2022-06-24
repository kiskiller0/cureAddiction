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
        
        while ($p = mysqli_fetch_assoc($pQuery)) {
            echo "<form action=\"deletePatient.php\" method=\"post\">";
            echo "<input name=\"username\" type=\"submit\" value=\"". $p["username"] ."\">";
            echo "</form>";
        }


        // printing a list of doctors:
        echo "<br>doctors:<br>";
        
        while ($d = mysqli_fetch_assoc($dQuery)) {
            echo "<form action=\"deleteDoctor.php\" method=\"post\">";
            echo "<input name=\"username\" type=\"submit\" value=\"". $d["username"] ."\">";
            echo "</form>";
        }


        echo "<a href=\"logout.php\">Log Out!</a>";

    } else {
        header('Location: html/adminLogin.html');
        die();
    }
} else {
    header('Location: html/adminLogin.html');
    die();
}