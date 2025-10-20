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
    }
    $string .= "</table>";
    return $string;
}

# Verbindung mit der Datenbank mit einem PDO Objekt

# Das Ergebnis des SQLs in form eines nummerischen Arrays (fetchAll) mit assoziativen Arrays als Elementen (PDO::FETCH_ASSOC)  in eine variable
$data = findAll('department');

require_once "../view/department/read.php";
?>



