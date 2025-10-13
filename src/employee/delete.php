<?php
$conn = new PDO('mysql:host=localhost;dbname=company', 'momo', 'momu1993');
$sql = 'DELETE FROM employees where id = :id';
//$id = $_GET['id'];
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
