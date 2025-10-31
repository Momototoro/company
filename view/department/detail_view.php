<?php
function department_detail_view(array $data): string {
    $id = (int)$data['id'];
    $name = htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8');
    $work_mode = htmlspecialchars($data['work_mode'], ENT_QUOTES, 'UTF-8');
    $is_hiring = $data['is_hiring'] ? 'Ja' : 'Nein';

    return "
        <h1>Details zum Department: $name</h1>

        <ul>
            <li>ID: $id</li>
            <li>Name: $name</li>
            <li>Aktiv im Hiring: $is_hiring</li>
            <li>Work Mode: $work_mode</li>
        </ul>

        <a href='/department/delete/$id'>Delete</a><br>
        <a href='/department/update/$id'>Update</a><br><br>
        <a href='/department/read'>Zurück zur Übersicht</a>
    ";
}