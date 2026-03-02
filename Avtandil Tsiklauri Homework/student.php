<?php
echo "<h1 style='text-align:center;'>Student Portal</h1>";

if(isset($_POST['saxeli'])){

    $qula = $_POST['qula'];

    if($qula >= 91){
        $shefaseba = "A - ფრიადი";
    }
    else if($qula >= 81){
        $shefaseba = "B - ძალიან კარგი";
    }
    else if($qula >= 71){
        $shefaseba = "C - კარგი";
    }
    else if($qula >= 61){
        $shefaseba = "D - დამაკმაყოფილებელი";
    }
    else if($qula >= 51){
        $shefaseba = "E - საკმარისი";
    }
    else{
        $shefaseba = "F/FX - ჩაჭრა";
    }

    echo "<table style='width:80%; margin:auto; border:2px solid #333; border-collapse: collapse; text-align:center; font-family:Arial;'>";
    echo "<tr style='background-color:#333; color:white;'>
            <th>სახელი</th>
            <th>გვარი</th>
            <th>კურსი</th>
            <th>სემესტრი</th>
            <th>სასწავლო კურსი</th>
            <th>ქულა</th>
            <th>შეფასება</th>
            <th>ლექტორი</th>
            <th>დეკანი</th>
          </tr>";

    echo "<tr>
            <td>".$_POST['saxeli']."</td>
            <td>".$_POST['gvari']."</td>
            <td>".$_POST['kursi']."</td>
            <td>".$_POST['semestri']."</td>
            <td>".$_POST['sasc_kursi']."</td>
            <td>".$qula."</td>
            <td>".$shefaseba."</td>
            <td>".$_POST['leqtori']."</td>
            <td>".$_POST['dekani']."</td>
          </tr>";

    echo "</table>";
}
?>