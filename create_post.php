<?php

require_once "db.php";
session_start();

if (!isset($_POST['content']) || empty($_POST['content'])) {
    echo "don't leave it empty!";
    echo "<a href=\"index.php\">go back!</a>";
} else {
    if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
        if (isset($_SESSION['table']) && $_SESSION['table'] == 'doctor') {
            $sql = "select id from doctor where username = '" . $_SESSION['username'] . "';";
            $id = mysqli_fetch_assoc(mysqli_query($conn, $sql))['id'];
            if (!$id) {
                die('fatal error!, username in session not in db!' . $sql);
            } else {
                echo $_POST['content'];
                $sql = "insert into posts(content, id_doctor) values('" . $_POST['content'] . "', $id);";
                echo $sql;
                if (!mysqli_query($conn, $sql)) {
                    die("error inserting content" . $_POST['content'] . "<br> sql: " . $sql);
                } else {
                    echo "data inserted!";
                    echo "<a href='index.php'>go back!</a>";
                }
            }
        }
    } else {
        echo "you are not in session!" . $_SESSION['username'];
        echo "<a href='index.php'>go back!</a>";
    }
}