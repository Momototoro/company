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
    <li>Name: <?= htmlspecialchars($data['fname']) ?></li>
    <li>Name: <?= htmlspecialchars($data['lname']) ?></li>
</ul>
<a href="/employee/delete/<?= $data['id'] ?>">Delete</a>
<br>
<a href="/employee/update/<?=$data['id'] ?>">Update</a>
<br><br>
<a href="/employee/read">Zurück zur Übersicht</a>

</body>
</html>