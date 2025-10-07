<?php
if (empty($_GET['id'])) {
    header("Location: first_read.php");
    exit;
}
$id = $_GET['id'];
$conn = new PDO("mysql:host=10.101.105.165;dbname=company", 'momo', 'momu1993');
$sql = 'DELETE FROM employees WHERE id = :id';
$statement = $conn->prepare($sql);
$statement->bindParam(':id', $id);
$statement->execute();
header("Location: first_read.php");
exit;
