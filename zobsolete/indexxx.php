<?php
function tabelle (array $data, array|false $keys = false ,string $color1 = "blue", string $color2 = "orange" ): string {
    $string = "";
    $string .= "<table>";
    $string .= "<tr>";
    if ($keys) {
        foreach ($keys as $key => $value) {
            $string .= "<th>$key</th>";
        }
        $string .= "</tr>";
    }
    else {
        foreach ($data[0] as $key => $value) {
            $string .= "<th>$key</th>";
        }
        $string .= "</tr>";
    }
    for ($i=0; $i<count($data);$i++) {
        $b_color = $i % 2 == 0 ? "background-color : $color1" : "background-color : $color2";
        $string .= "<tr style = \"$b_color\"> ";
        foreach ($data[$i] as $key => $value) {
            $string .= "<td>$value</td>";
        }
        $string .= "</tr>";
    }
    return $string ;}

if ($_SERVER["REQUEST_METHOD"] == "GET" ) {
$host = '10.101.105.165';       // IP-Adresse oder Hostname des MariaDB-Servers
$dbname = 'company';        // Deine Datenbank
$username = 'momo';             // Benutzername
$password = 'momu1993';         // Passwort
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4"; // DSN = Data Source Name
try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Rest des Codes
} catch (PDOException $e) {
    echo "Datenbank-Verbindungsfehler: " . $e->getMessage();
    exit;
}
//$conn = new PDO($dsn, $username, $password);
$sql = "select * from employees";
$stmt = $conn->prepare($sql);
$stmt->execute();
$array = $stmt->fetchAll(pdo::FETCH_ASSOC);

//echo "Eintrag erfolgreich<br>";
} ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kilians Testseite</title>
    <link rel="stylesheet" href="my_style.css">
</head>
<body>
<h1>Seite für Tests</h1>
<form>
    <?php  echo tabelle($array) ?>
</form>
</body>
</html>

