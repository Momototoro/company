<?php
function employee_detail_view(array $data): string {
    $id = (int)$data['id'];
    $fname = htmlspecialchars($data['fname'], ENT_QUOTES, 'UTF-8');
    $lname = htmlspecialchars($data['lname'], ENT_QUOTES, 'UTF-8');

    return "
        <h1>Details zum Department: $fname</h1>

        <ul>
            <li>ID: $id</li>
            <li>Name: $fname</li>
            <li>Name: $lname</li>
        </ul>

        <a href='/employee/delete/$id'>Delete</a><br>
        <a href='/employee/update/$id'>Update</a><br><br>
        <a href='/employee/read'>Zurück zur Übersicht</a>
    ";
}