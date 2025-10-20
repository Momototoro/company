<?php
function createTable(array $data, array|false $ueberschrifeten = false, string $farbe_1 = 'F5D2D2', string $farbe_2 = 'BDE3C3'): string
{
    $string = "<table>";
    $string .= "<tr>";
    foreach ($data[0] as $key => $value) {
        $string .= "<th>";
        $string .= "$key";
        $string .= "</th>";
    }
    $string .= "</tr>";


    foreach ($data as $index => $user) {
        if ($index % 2 == 0) {
            $color = $farbe_1;
        } else {
            $color = $farbe_2;
        }
        $id = $user['id'];
        $string .= "<tr style='cursor: pointer;' onclick=\"window.location='/department/detail/$id'\">";
        foreach ($user as $key => $item) {
            $string .= "<td>";
            if ($key === 'is_hiring') {
                if ($item === 0) {
                    $string .= '&#10060';
                } else {
                    $string .= '✔️';
                }
            }else{
                $string .= $item;
            }
            $string .= "</td>";
        }
//        $string .= "<td>";
//        $id = $user['id'];
//        $string .= "<a href='/department/delete/$id'>Delete</a>";
//        $string .= "</td>";
//        $string .= "<td class='link'>";
//        $string .= "<a href='/department/update/$id'>Update</a>";
//        $string .= "</td>";
//        $string .= "</tr>";
    }
    $string .= "</table>";
    return $string;
}

# Verbindung mit der Datenbank mit einem PDO Objekt

# Das Ergebnis des SQLs in form eines nummerischen Arrays (fetchAll) mit assoziativen Arrays als Elementen (PDO::FETCH_ASSOC)  in eine variable
$array = findAll('department');
//echo "<pre>";
//var_dump($_SERVER);
//echo "</pre>";
//var_dump(findById(1, 'department'));

?>


<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
<!--    <link rel='stylesheet' href='../assets/css/mystyle.css'>-->
    <link rel='stylesheet' href='http://www.company.moritz.web.bbq/assets/css/mystyle.css'>
    <title>Document</title>
</head>
<body>
<?= createTable($array) ?>
<br>
<a href="http://www.company.moritz.web.bbq/">Zurück zur Übersicht</a>
</body>
</html>
