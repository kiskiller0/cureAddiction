<!DOCTYPE html>
<html lang="en">

<head>
    <meta `ch`arset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome!</title>
</head>

<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    session_start();

    require_once "db.php";
    require_once "dbFunctions.php";

    if (!isset($_SESSION["username"])) {
        require_once "html/signup.html";
        echo "<br><hr>";
        require_once "html/signin.html";
    } else {
        $petName = $_SESSION["table"] == "doctor" ? "Dr." : "dear ";
        echo "<h3> Hello $petName<span id=\"username\">" . $_SESSION['username'] . "</span>, how are you doing today!</h3?>";
        echo '<a href="logout.php">log out!</a>';
    ?>
    <?php
        if ($_SESSION["table"] == "doctor") {
            require_once "html/create_post.html";
        } else {
            $sql = "select username from doctor;";
            echo "<br>available doctors:<br>";
            echo '<form method="post" action="addDoctor.php">';
            $query = mysqli_query($conn, $sql);
            while($data = mysqli_fetch_assoc($query)) {
                $username = $data['username'];
                echo '<div class="addDocBox">';
                echo '<label class="docListItem docLabel">' . $username . '</label>';
                echo '<input class="docListItem addDocButton" type="submit" name="username" value="'. $username . '">';
                echo '</div>';
            }
            echo '</form><br>';
            echo "<h3> Posts from your doctors:</h3>";
            $yourId = "select id from patient where username = '" . $_SESSION["username"] . "';";
            $yourId = mysqli_query($conn, $yourId);
            $yourId = mysqli_fetch_assoc($yourId)['id'];
            // echo $yourId;

            $sql = 
            "
                select content, date_post, id_doctor from posts
                where id_doctor in (
                select id_doctor from association where id_patient = $yourId
                );
            ";
            // echo $sql;

            $fetchedResults = mysqli_query($conn, $sql);
            
            while($content = mysqli_fetch_assoc($fetchedResults)) {
                $sql = "select username from doctor where id = " . $content["id_doctor"] . ";";
                $doctorUsername = mysqli_fetch_assoc(mysqli_query($conn, $sql))['username'];
                echo '
                    <div class="postDiv">
                        <p class="doctorId"> ' . $doctorUsername . ' said:</p>
                        <p class="postContent">' . $content['content'] . ' </p>
                        <p class="date">at: ' . $content['date_post'] . '
                    </div>
                ';
            }
        }
    }
    ?>
</body>
<script src="script.js"></script>

</html>