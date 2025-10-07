<?php

function createTable(array $data): string
{
    $html_string = "<table class='table'>";
    $html_string .= "<tr>";
    foreach ($data[0] as $key => $value) {
        $html_string .= "<th>";
        $html_string .= "$key";
        $html_string .= "</th>";
    }
    $html_string .= "</tr>";
    foreach ($data as $dataSet) {
        $html_string .= "<tr>";
        foreach ($dataSet as $dataEntry) {
            if ($dataEntry === 'ip') {
                $html_string .= "<td><a href='http://<?=$dataEntry?>' target='_blank'>$dataEntry</a></td>";
            } else {
                $html_string .= "<td>$dataEntry</td>";
            }
        }

        $id = $dataSet['id'];

        $html_string .= "<td><a href='./first_update.php?id=$id'>Bearbeiten</a></td>";
        $html_string .= "<td><a href='./first_delete.php?id=$id'>Löschen</a></td>";
        $html_string .= "</tr>";
    }
    return $html_string;
}

$conn = new PDO("mysql:host=10.101.105.165;dbname=company", 'momo', 'momu1993');
$sql = 'SELECT * FROM employees';
$statement = $conn->prepare($sql);
$statement->execute();
$table_data = $statement->fetchAll(PDO::FETCH_ASSOC);

echo createTable($table_data);

if ($_SERVER["REQUEST_METHOD"] === 'GET') {
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Momo</title>
        <link rel="stylesheet" href="my_style.css">
    </head>
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
    <?php
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $conn = new PDO("mysql:host=10.101.105.165;dbname=company", 'momo', 'momu1993');
    $statement = $conn->prepare("INSERT INTO employees (fname, lname) VALUES (:fname, :lname)");
    $statement->bindParam(':fname', $fname);
    $statement->bindParam(':lname', $lname);
    $statement->execute();
}
?>



