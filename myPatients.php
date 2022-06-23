<?php

require_once "db.php";
require_once "dbFunctions.php";

if ($_SESSION["table"] != "doctor") {
    die ("you are a user! you should not be here!");
}

$idDoctor = getAttribute($conn, "doctor", "username", $_SESSION["username"])['id'];
$sql =
"
    select username from patient where id in 
    (
        select id_patient from association
        where id_doctor = $idDoctor
    );
";

// echo $sql . "<br>id: $idDoctor<br>";

$patients =mysqli_query($conn, $sql);

echo '<span class="notice">my patients:</spane><br>';

while($patient = mysqli_fetch_assoc($patients)) {

    echo '
    <div class="patientBox">
        <form method="post" action="getPatientInfo.php">
            <input type="submit" name="username" value="'. $patient["username"] .'">
        </form>
    </div>
    ';

}

