<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture 2</title>
    <style>
        form{
            width: 400px;
            margin: auto;
            border: solid 1px black;
            padding: 10px;
        }
    </style>
</head>
<body>
    <form action="worker.php" method="get">
        <input type="text" placeholder = "name" id="name" name="name">
        <br><br>
        <input type="text" placeholder = "Subject" id= "subject" name="subject">
        <br><br>
        <button>Send Information (GET)</button>
        <!-- <button onclick="Submit()">Send Information</button> -->
    </form>
    
    <hr><hr>
    
    <form action="worker.php" method="post">
        <input type="text" placeholder = "name" id="name" name="name">
        <br><br>
        <input type="text" placeholder = "Subject" id= "subject" name="subject">
        <br><br>
        <button>Send Information (POST)</button>
        <!-- <button onclick="Submit()">Send Information</button> -->
    </form>

    <?php

    ?>
    <script>
        function Submit(){
            let name = document.getElementById("name").value;
            let subject = document.getElementById("subject").value;

            alert(name + " Studies " + subject)
        }
    </script>
</body>
</html>