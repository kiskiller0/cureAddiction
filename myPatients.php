<?php

require_once "db.php";
require_once "dbFunctions.php";

if ($_SESSION["table"] != "doctor") {
    die ("you are a user! you should not be here!");
}

$idDoctor = getAttribute($conn, "association", "username", $_SESSION["username"]);
$sql =
"
    select username from patient where id in 
    (
        select id_patient from posts
        where id_doctor = $idDoctor
    );
";
echo $sql;

$patients =mysqli_query($conn, $sql);

while($patient = mysqli_fetch_assoc($patients)) {

    echo '
        <form method="post" action="getPatientInfo">
            <label>'. $patient["username"] . '</label>
            <input type="submit" value="'. $patient["username"] .'">
        </form>
    ';

}

