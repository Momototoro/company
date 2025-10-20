<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='http://www.company.moritz.web.bbq/assets/css/mystyle.css'>
    <title>Department Details</title>
</head>
<body>
<h1>Details zum Department: <?= htmlspecialchars($data['name']) ?></h1>

<ul>
    <li>ID: <?= htmlspecialchars($data['id']) ?></li>
    <li>Name: <?= htmlspecialchars($data['name']) ?></li>
    <li>Aktiv im Hiring: <?= $data['is_hiring'] ? 'Ja' : 'Nein' ?></li>
    <li>Work Mode: <?= htmlspecialchars($data['work_mode']) ?></li>
</ul>
<a href="/department/delete/<?= $data['id'] ?>">Delete</a>
<br>
<a href="/department/update/<?= $data['id'] ?>">Update</a>
<br><br>
<a href="/department/read">Zurück zur Übersicht</a>

</body>
</html>