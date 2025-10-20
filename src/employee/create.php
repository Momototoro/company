<?php
if ($_SERVER["REQUEST_METHOD"] === 'GET'){
    require_once "../view/employee/create.html";
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $last_id = create('employees',$_POST);
    header("Location: ". DOMAIN_NAME. "/employee/detail/$last_id");
    exit();
}
?>