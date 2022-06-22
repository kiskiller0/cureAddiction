<?php
session_start();
session_destroy();

// echo "<script>alert('session destroyed!')</script>;";

header("Location: index.php");