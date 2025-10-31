<?php
$data = findById($id, 'employees');
//require_once "../view/employee/detail_view.php";
echo render("employee_detail_view", $data);
?>

