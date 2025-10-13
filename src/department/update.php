<?php
$conn = new PDO("mysql:host=10.101.105.165;dbname=company", 'momo', 'momu1993');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (empty($_GET['id'])) {
        header("Location: read.php");
        exit;
    }
    $id = $_GET['id'];
    $sql = 'SELECT * FROM departments WHERE id = :id';
    $statement = $conn->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $response = $statement->fetch(PDO::FETCH_ASSOC);
    if (!$response) {
        echo "department nicht gefunden!";
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $is_hiring = isset($_POST['is_hiring']) ? 1 : 0;
    $work_mode = $_POST['work_mode'];
    $sql = "UPDATE departments SET name = :name, is_hiring = :is_hiring, work_mode = :work_mode WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':is_hiring', $is_hiring);
    $statement->bindParam(':id', $id);
    $statement->bindParam(':work_mode', $work_mode);
    $statement->execute();
    header("Location: read.php");
    exit;
}
else {
    header("Location: read.php");
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
            Department Name
            <input type="text" name="name" required value="<?=htmlspecialchars($response['name'])?>">
        </label><br>
        <label>
            Department in hiring?
            <input type="checkbox" name="is_hiring" value="1" <?= $response['is_hiring'] ? 'checked' : '' ?>>
        </label>
        <label>
            Work mode:
            <input type = "radio" name="work_mode" value="remote" <?= ($response['work_mode'] === 'remote') ? 'checked' : '' ?>>
        </label><br>
        <label>
            Work mode:
            <input type = "radio" name="work_mode" value="hybrid" <?= ($response['work_mode'] === 'hybrid') ? 'checked' : '' ?>>
        </label><br>
        <label>
            Work mode:
            <input type = "radio" name="work_mode" value="onsite" <?= ($response['work_mode'] === 'onsite') ? 'checked' : '' ?>>
        </label><br>
        <input type="submit" value="Speichern">
    </form>
</div>
<p><a href="read.php">Zur Übersicht</a></p>
</body>
</html>
