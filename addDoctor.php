<?php

require_once "db.php";

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

if (empty($_POST["username"])) {
    die ("field empty! quit tampering!");
} else {
    $sql = "select id from doctor where username = '" . $_POST['username'] . "';";
    echo $sql."<br>";

    $idDoctor = mysqli_fetch_assoc(mysqli_query($conn, $sql))['id'];
    echo "doctorId: $idDoctor";
    $sql = "select id from patient where username = '" . $_SESSION['username'] . "';";
    echo $sql."<br>";
    $idPatient = mysqli_fetch_assoc(mysqli_query($conn, $sql))['id'];
    echo "idPatient: $idPatient";
    $sql = "insert into association(id_patient, id_doctor) values($idPatient, $idDoctor);";
    echo $sql."<br>";
    $createAssociationQuery = mysqli_query($conn, $sql);
}

if ($createAssociationQuery) {
    header("Location: index.php");
} else {
    die("problem executing $idDoctor <br> $idPatient");
}