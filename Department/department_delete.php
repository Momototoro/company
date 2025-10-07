<?php
if (empty($_GET['id'])) {
    header("Location: department_read.php");
    exit;
}
$id = $_GET['id'];
$conn = new PDO("mysql:host=10.101.105.165;dbname=company", 'momo', 'momu1993');
$sql = 'DELETE FROM departments WHERE id = :id';
$statement = $conn->prepare($sql);
$statement->bindParam(':id', $id);
$statement->execute();
header("Location: department_read.php");
exit;
