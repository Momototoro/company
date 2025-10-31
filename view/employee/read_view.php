<?php
function employee_read_view(array $data, string $farbe_1 = 'F5D2D2', string $farbe_2 = 'BDE3C3'): string
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