<?php
$conn = new PDO("mysql:host=10.101.105.165;dbname=company", 'momo', 'momu1993');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (empty($_GET['id'])) {
        header("Location: first_read.php");
        exit;
    }
    $id = $_GET['id'];
    $sql = 'SELECT * FROM employees WHERE id = :id';
    $statement = $conn->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $response = $statement->fetch(PDO::FETCH_ASSOC);
    if (!$response) {
        echo "Mitarbeiter nicht gefunden!";
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $sql = "UPDATE employees SET fname = :fname, lname = :lname WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->bindParam(':fname', $fname);
    $statement->bindParam(':lname', $lname);
    $statement->bindParam(':id', $id);
    $statement->execute();
    header("Location: first_read.php");
    exit;
} else {
    header("Location: first_read.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Mitarbeiter bearbeiten</title>
    <link rel="stylesheet" href="my_style.css">
</head>
<body>
<h1>Mitarbeiter bearbeiten</h1>
<div class="form-input">
    <form action="" method="post">
        <input type="hidden" name="id" value="<?=htmlspecialchars($response['id'])?>">
        <label>
            First Name
            <input type="text" name="fname" required value="<?=htmlspecialchars($response['fname'])?>">
        </label><br>
        <label>
            Last Name
            <input type="text" name="lname" required value="<?=htmlspecialchars($response['lname'])?>">
        </label><br><br>
        <input type="submit" value="Speichern">
    </form>
</div>
<p><a href="first_read.php">Zur Übersicht</a></p>
</body>
</html>
