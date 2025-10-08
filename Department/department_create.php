<?php
$conn = new PDO("mysql:host=10.101.105.165;dbname=company", 'momo', 'momu1993');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $is_hiring = isset($_POST['is_hiring']) ? 1 : 0;
    $work_mode = $_POST['work_mode'];
    $statement = $conn->prepare("INSERT INTO departments (name, is_hiring, work_mode) VALUES (:name, :is_hiring, :work_mode)");
    $statement->bindParam(':name', $name);
    $statement->bindParam(":is_hiring", $is_hiring, PDO::PARAM_BOOL);
    $statement->bindParam(':work_mode', $work_mode, PDO::PARAM_STR);
    $statement->execute();
    header("Location: department_read.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Department hinzufügen</title>
    <link rel="stylesheet" href="my_style.css">
</head>
<body>
<h1>Neues Department anlegen</h1>
<div class="form-input">
    <form action="" method="post">
        <label>
            Name:
            <input type="text" name="name" placeholder="Department Name" required>
        </label><br>
        <label>
            Is Hiring:
            <input type="checkbox" name="is_hiring" value="1">
        </label><br>
        <label>
            Work mode:
            <input type = "radio" name="work_mode" value="remote"> Remote
        </label><br>
        <label>
            Work mode:
            <input type = "radio" name="work_mode" value="hybrid"> Hybrid
        </label><br>
        <label>
            Work mode:
            <input type = "radio" name="work_mode" value="onsite"> Onsite
        </label><br>
        <input type="submit" value="Absenden">
    </form>
</div>
<p><a href="department_read.php">Zur Übersicht</a></p>
</body>
</html>
