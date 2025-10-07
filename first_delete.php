<?php
$conn = new PDO("mysql:host=10.101.105.165;dbname=company", 'momo', 'momu1993');
$sql = 'DELETE FROM employees WHERE id = :id';
$statement = $conn->prepare($sql);
$id = $_GET['id'];
$statement->bindParam(':id', $id);
$statement->execute();
