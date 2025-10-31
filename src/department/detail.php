<?php
$data= findById($id, 'department');
//require_once "../view/department/detail_view.php"
echo render("department_detail_view", $data);
?>
