<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "db.php";

function insertTextAttribute($connection, $tableName, $attributes, $values)
{
    $sql = "insert into $tableName(";

    for ($i = 0; $i < count($attributes); $i++) {
        $sql .= $attributes[$i];
        if ($i == count($attributes) - 1) {
            continue;
        } 
        $sql .= ',';
    }

    $sql .= ') values(';

    for ($i = 0; $i < count($attributes); $i++) {
        $sql .= "'" . $values[$attributes[$i]] . "'";
        if ($i == count($attributes) - 1) {
            continue;
        } 
        $sql .= ',';
    }
    $sql .= ');';

    // echo "<br>" . $sql . "<br>"; // debug mode only!

    mysqli_query($connection, $sql)
        or die("error executing : '$sql' into table $tableName car:je ne sais pas comment imprimer l'error mysql d'apres php! ");
}

function getAttribute($conn, $tableName, $attributeName, $value) {

    $sql = "
        select * from $tableName
        where $attributeName = '$value';
    ";

    // echo "getAttribute: " . $sql . "<br>"; // debug mode only!

    return mysqli_fetch_assoc(mysqli_query($conn, $sql));
}
