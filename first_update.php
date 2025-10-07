<?php

if ($_SERVER["REQUEST_METHOD"] === 'GET') {
    $id = $_GET['id'];
    $conn = new PDO("mysql:host=10.101.105.165;dbname=company", 'momo', 'momu1993');
    $sql = 'SELECT * FROM employees WHERE id = :id';
    $statement = $conn->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $response = $statement->fetch();
    $fname = $response['fname'];
    $lname = $response['lname'];
    ?>

    <!DOCTYPE html>
    <html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>Mein Webseiten-Titel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <form action="" method="post">
        <label>
            First Name
            <input type="text" name="fname" placeholder="First name" value="<?=$fname?>">
        </label><br>
        <label>
            Last Name
            <input type="text" name="lname" placeholder="Last name" value="<?=$lname?>">
        </label><br><br>
        <input type="hidden" name="id" placeholder="ID" required>
        <input type="submit" value="Absenden">
    </form>
    </body>
    </html>
    <?php
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $id = $_POST['id'];
    $conn = new PDO("mysql:host=10.101.105.165;dbname=company", 'momo', 'momu1993');
    $sql = "UPDATE employees SET fname = :fname, lname = :lname WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->bindParam(':fname', $fname);
    $statement->bindParam(':lname', $lname);
    $statement->bindParam(':id', $id);
    $id = $statement['id'];
}



