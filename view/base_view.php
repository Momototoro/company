<?php

function render(callable $content, array $data = []):string {
    return "<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <link rel='stylesheet' href='http://www.company.moritz.web.bbq/assets/css/mystyle.css'>
    <title>Document</title>
</head>
<body>
<header class='site-header'>
  <div class='logo-container'>
    <a href='http://www.company.moritz.web.bbq/' rel='noopener' class='logo-link'>
      <img src='/assets/images/logo.png' alt='Firmenlogo' class='logo-image'>
      <h1 class='site-title'>Deine Firma</h1>
    </a>
  </div>
</header>
<div>
    <div>Department</div>
    <div>
        <ul>
            <li><a href='/department/create'>Create a department</a></li>
            <li><a href='/department/read'>Show all departments</a></li>

        </ul>
    </div>
</div>
<div>Employees</div>
<div>
    <ul>
        <li><a href='/employee/create'>Create a new employee</a></li>
        <li><a href='/employee/read'>Show all employees</a></li>

    </ul>
</div>
<div>". $content($data) . "


</div>
</body>
</html>";
}