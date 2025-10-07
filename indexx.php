<?php
require("names.php");

$json = file_get_contents('kea-dhcp4.conf');
$dhcp_config = json_decode($json, true);

if ($dhcp_config === null) {
    die("Fehler beim Laden der JSON-Datei");
}

if(in_array("mysql",PDO::getAvailableDrivers())){
    echo " You have PDO for MySQL driver installed ";
}else{
    echo "PDO driver for MySQL is not installed in your system";
}

function createTable(array $data, string $farbe_1 = 'blue', string $farbe_2 = 'red'): string
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
        $html_string .= "</tr>";
    }
    return $html_string;
}

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Alexander</title>
    <link rel="stylesheet" href="my_style.css">
</head>
<body>
<div>
    <div class="topbar">
        <div>
            <h1>Hi👋</h1>
            <div class="introduction">
                <h2>Ich bin
                    <mark>Alexander</mark>
                    , 28 Jahre.
                </h2>
                <p class="paragraph">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                    tempor invidunt ut labore et
                    dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
                    rebum. Stet
                    clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                    amet,
                    consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna
                    aliquyam erat,
                    sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
                    gubergren, nob
                    sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            </div>
            <a href="first_create.php" target="_blank">First read page</a>
        </div>
        <div>
            <div class="avatar">
                <img src="avatar.jpg" alt="Avatar"/>
            </div>
        </div>
    </div>
    <p><strong>Klasse B-WI138_u-FI-241209</strong></p>
    <?= createTable($users) ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Interface</th>
                <th>max valid lifetime</th>
                <th>IP-Adresse</th>
                <th>Subnetz</th>
                <th>DNS</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($dhcp_config as $dhcp) {
                $dhcp["subnet4"][0]["subnet"] = $users[7]["ip"];
                $dhcp["subnet4"][0]["option-data"][2]["data"] = $users[7]["domain"];
                $dhcp["subnet4"][0]["option-data"][3]["data"] = $users[7]["domain"];
                ?>
                <tr>
                    <td><?= $dhcp["interfaces-config"]["interfaces"][0] ?></td>
                    <td><?= $dhcp["max-valid-lifetime"] ?></td>
                    <td><?= $dhcp["subnet4"][0]["subnet"] ?></td>
                    <td><?= $dhcp["subnet4"][0]["option-data"][0]["data"] ?></td>
                    <td><?= $dhcp["subnet4"][0]["option-data"][2]["data"] ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <div>
        <h3>Geplante Projekte</h3>
        <ul>
            <li>
                <a href="./project_1.html" target="_blank">Projekt 1</a>
            </li>
            <li>
                <a href="./project_2.html" target="_blank">Projekt 2</a>
            </li>
            <li>
                <a href="./project_3.html" target="_blank">Projekt 3</a>
            </li>
        </ul>
    </div>
    <div>
        <h4>Mein Portfolio auf Notion</h4>
        <a>Mein Portfolio</a>
    </div>
</div>
</body>
</html>