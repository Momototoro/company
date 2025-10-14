<?php
$department = findById($id, 'department');

?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='http://www.company.moritz.web.bbq/assets/css/mystyle.css'>
    <title>Department Details</title>
</head>
<body>
<h1>Details zum Department: <?= htmlspecialchars($department['name']) ?></h1>

<ul>
    <li>ID: <?= htmlspecialchars($department['id']) ?></li>
    <li>Name: <?= htmlspecialchars($department['name']) ?></li>
    <li>Aktiv im Hiring: <?= $department['is_hiring'] ? 'Ja' : 'Nein' ?></li>
    <li>Work Mode: <?= htmlspecialchars($department['work_mode']) ?></li>
</ul>
<a href="/department/delete/<?= $department['id'] ?>">Delete</a>
<br>
<a href="/department/update/<?= $department['id'] ?>">Update</a>
<br><br>
<a href="/department/read">Zurück zur Übersicht</a>

</body>
</html>