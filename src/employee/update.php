<?php

if ($_SERVER["REQUEST_METHOD"] === 'GET') {

    $data = findById($id,'employees');
//    require_once "../view/employee/update_view.php";
    echo render("employee_update_view", $data);
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
    update('employees',$_POST);
    header("Location: ". DOMAIN_NAME. "/employee/detail/$_POST[id]");
    exit();
}
?>