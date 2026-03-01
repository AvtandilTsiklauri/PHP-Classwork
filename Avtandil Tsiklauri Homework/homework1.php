<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>სახელფასო უწყისი</title>
    <style>
        form {
            width: 400px;
            margin: auto;
            border: solid 1px black;
            padding: 10px;
        }
    </style>
</head>
<body>

    <h1 style="text-align:center;">სახელფასო უწყისი</h1>

    <h3 style="text-align:center;">ფიქსირებული გადასახადი (20%)</h3>
    <form action="worker.php" method="get">

        <input type="text" placeholder="სახელი" name="saxeli">
        <br><br>
        <input type="text" placeholder="გვარი" name="gvari">
        <br><br>

        <label>აირჩიეთ თანამდებობა:</label>
        <br>
        <select name="tanamdeboba">
            <option value="direqtori">დირექტორი — 3000₾</option>
            <option value="menejeri">მენეჯერი — 2000₾</option>
            <option value="bugalteri">ბუღალტერი — 1700₾</option>
        </select>
        <br><br>

        <input type="hidden" name="percent" value="20">

        <button>გაგზავნა</button>

    </form>

    <br><br>

    <h3 style="text-align:center;">არჩეული გადასახადი</h3>
    <form action="worker.php" method="get">

        <input type="text" placeholder="სახელი" name="saxeli">
        <br><br>
        <input type="text" placeholder="გვარი" name="gvari">
        <br><br>

        <label>აირჩიეთ თანამდებობა:</label>
        <br>
        <select name="tanamdedoba">
            <option value="programisti">პროგრამისტი — 2500₾</option>
            <option value="dizaineri">დიზაინერი — 1800₾</option>
            <option value="marketologi">მარკეტოლოგი — 2100₾</option>
        </select>
        <br><br>

        <label>აირჩიეთ გადასახადის პროცენტი:</label>
        <br>
        <select name="percent">
            <option value="10">10%</option>
            <option value="15">15%</option>
            <option value="20">20%</option>
            <option value="25">25%</option>
        </select>
        <br><br>

        <button>გაგზავნა</button>

    </form>

</body>
</html>