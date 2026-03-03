<?php

$score = 0;

if(isset($_POST['q1'])){

    if($_POST['q1'] == "PHP"){
        $score++;
    }

    if($_POST['q2'] == "Hard Drive"){
        $score++;
    }

    if($_POST['q3'] == "Spinosaurus"){
        $score++;
    }

    if(strtolower($_POST['q4']) == "vasia"){
        $score++;
    }

    if(strtolower($_POST['q5']) == "javascript"){
        $score++;
    }

    echo "<h2>სწორი პასუხების რაოდენობა: $score / 5</h2>";
}
?>