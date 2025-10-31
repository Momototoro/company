<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//    require_once "../view/department/create_view.php";
    echo render("department_create_view");
    exit;
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $last_id = create('department',$_POST);
    header("Location: ". DOMAIN_NAME. "/department/detail/$last_id");
    exit();
}


?>



