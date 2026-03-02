<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Portal Sign In</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 400px;
            margin: 30px auto;
            border: 2px solid #333;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            box-sizing: border-box;
            text-align: center;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<h1>Portal Sign In</h1>

<form action="Student.php" method="post">

    <input type="text" name="saxeli" placeholder="სტუდენტის სახელი" required>
    <input type="text" name="gvari" placeholder="სტუდენტის გვარი" required>
    <input type="text" name="kursi" placeholder="კურსი" required>
    <input type="text" name="semestri" placeholder="სემესტრი" required>
    <input type="text" name="sasc_kursi" placeholder="სასწავლო კურსი" required>
    <input type="number" name="qula" placeholder="მიღებული ქულა" min="0" max="100" required>

    <input type="text" name="leqtori" placeholder="ლექტორის სახელი და გვარი" required>
    <input type="text" name="dekani" placeholder="დეკანის სახელი და გვარი" required>

    <button>Submit</button>

</form>

</body>
</html>