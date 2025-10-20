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
        $string .= "<tr style='cursor: pointer;' onclick=\"window.location='/employee/detail/$id'\">";
        foreach ($user as $item) {
            $string .= "<td>";
            $string .= $item;
            $string .= "</td>";
        }
    }
    $string .= "</table>";
    return $string;
}


# Das Ergebnis des SQLs in form eines nummerischen Arrays (fetchAll) mit assoziativen Arrays als Elementen (PDO::FETCH_ASSOC)  in eine variable
$data = findAll('employees');

require_once "../view/employee/read.php";
?>


