<?php
$conn = new PDO("mysql:host=10.101.105.165;dbname=company", 'momo', 'momu1993');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (empty($_GET['id'])) {
        header("Location: department_read.php");
        exit;
    }
    $id = $_GET['id'];
    $sql = 'SELECT * FROM departments WHERE id = :id';
    $statement = $conn->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $response = $statement->fetch(PDO::FETCH_ASSOC);
    if (!$response) {
        echo "Department nicht gefunden!";
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $fname = $_POST['name'];
    $sql = "UPDATE depertments SET name = :name WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->bindParam(':name', $fname);
    $statement->bindParam(':id', $id);
    $statement->execute();
    header("Location: department_read.php");
    exit;
} else {
    header("Location: department_read.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Department bearbeiten</title>
    <link rel="stylesheet" href="my_style.css">
</head>
<body>
<h1>Department bearbeiten</h1>
<div class="form-input">
    <form action="" method="post">
        <input type="hidden" name="id" value="<?=htmlspecialchars($response['id'])?>">
        <label>
            First Name
            <input type="text" name="name" required value="<?=htmlspecialchars($response['name'])?>">
        </label><br>
        <input type="submit" value="Speichern">
    </form>
</div>
<p><a href="department_read.php">Zur Übersicht</a></p>
</body>
</html>
