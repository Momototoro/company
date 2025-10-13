<?php
$conn = new PDO("mysql:host=10.101.105.165;dbname=company", 'momo', 'momu1993');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $statement = $conn->prepare("INSERT INTO employees (fname, lname) VALUES (:fname, :lname)");
    $statement->bindParam(':fname', $fname);
    $statement->bindParam(':lname', $lname);
    $statement->execute();
    header("Location: read.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Mitarbeiter hinzufügen</title>
    <link rel="stylesheet" href="../my_style.css">
</head>
<body>
<h1>Neuen Mitarbeiter anlegen</h1>
<div class="form-input">
    <form action="" method="post">
        <label>
            First Name
            <input type="text" name="fname" placeholder="First name" required>
        </label><br>
        <label>
            Last Name
            <input type="text" name="lname" placeholder="Last name" required>
        </label><br><br>
        <input type="submit" value="Absenden">
    </form>
</div>
<p><a href="read.php">Zur Übersicht</a></p>
</body>
</html>
