<?php
session_start();

$_SESSION["user"] = "Avto";

echo "Session saved. Go to get_session.php";
?>