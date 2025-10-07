<?php
function createTable(array $data): string
{
    $html_string = "<table class='table'>";
    $html_string .= "<tr>";
    foreach ($data[0] as $key => $value) {
        $html_string .= "<th>$key</th>";
    }
    $html_string .= "<th>Bearbeiten</th><th>Löschen</th>";
    $html_string .= "</tr>";

    foreach ($data as $dataSet) {
        $html_string .= "<tr>";
        foreach ($dataSet as $key => $dataEntry) {
            $html_string .= "<td>$dataEntry</td>";
        }
        $id = $dataSet['id'];
        $html_string .= "<td><a href='first_update.php?id=$id'>Bearbeiten</a></td>";
        $html_string .= "<td><a href='first_delete.php?id=$id' onclick=\"return confirm('Wirklich löschen?');\">Löschen</a></td>";
        $html_string .= "</tr>";
    }
    $html_string .= "</table>";
    return $html_string;
}

$conn = new PDO("mysql:host=10.101.105.165;dbname=company", 'momo', 'momu1993');
$sql = 'SELECT * FROM employees';
$statement = $conn->prepare($sql);
$statement->execute();
$table_data = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Mitarbeiter Übersicht</title>
    <link rel="stylesheet" href="my_style.css">
</head>
<body>
<h1>Mitarbeiter Übersicht</h1>
<p><a href="first_create.php">Neuen Mitarbeiter anlegen</a></p>
<?php
if ($table_data) {
    echo createTable($table_data);
} else {
    echo "<p>Keine Mitarbeiter gefunden.</p>";
}
?>
</body>
</html>
