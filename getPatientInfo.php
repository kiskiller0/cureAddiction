<?php

require_once "db.php";
require_once "dbFunctions.php";

if (!isset($_POST["username"]) || empty($_POST["username"])) {
    die ("do not screw with the html code!");
} else {
    echo "info for patient: " . $_POST['username'];
    $user = getAttribute($conn, "patient", "username", $_POST["username"]);
    // echo $sql;
    // $query = mysqli_query($conn, $sql);
    // $user = mysqli_fetch_assoc($query);
    if (empty($user)) {
        die ("no such username!");
    } else {
        echo empty($user["fname"])? "no fname!" : $user["fname"]."!";

        echo '
            <div class="info">
                <p>First name: ' . $user["fname"]. '</p>
                <p>Last name: ' . $user["lname"]. '</p>
                <p>Address: ' . $user["address"]. '</p>
                <p>Drug: ' . $user["drug"]. '</p>
                <p>Frequency: ' . $user["frequency"]. ' times a day!</p>
            </div>
        ';
    }
}


