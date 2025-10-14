<?php
$employee = findById($id, 'employees');

?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='http://www.company.moritz.web.bbq/assets/css/mystyle.css'>
    <title>Department Details</title>
</head>
<body>
<h1>Details zum Department: <?= htmlspecialchars($employee['name']) ?></h1>

<ul>
    <li>ID: <?= htmlspecialchars($employee['id']) ?></li>
    <li>Name: <?= htmlspecialchars($employee['fname']) ?></li>
    <li>Name: <?= htmlspecialchars($employee['lname']) ?></li>
</ul>
<a href="/employee/delete/<?= $employee['id'] ?>">Delete</a>
<br>
<a href="/employee/update/<?=$employee['id'] ?>">Update</a>
<br><br>
<a href="/employee/read">Zurück zur Übersicht</a>

</body>
</html>