<?php
    echo "<h1>worker</h1>";

    echo "<pre>";
    print_r($_GET);
    echo "</pre>";

    if(isset($_GET['name']) && isset($_GET['subject'])){
        echo "<p>".$_GET['name']." Studies ".$_GET['subject']."</p>";
    }

    echo "<hr><hr>";

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    if(isset($_POST['name']) && isset($_POST['subject'])){
        echo "<p>".$_POST['name']." Studies ".$_POST['subject']."</p>";
    }
?>