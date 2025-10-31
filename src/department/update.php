<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $data = findById($id,'department');
    if ($data['is_hiring']){
        $data["checked"] = 'checked';
    }else{
        $data["checked"] = '';
    }
    $work_mode = $data['work_mode'];

//    require_once "../view/department/update_view.php";
    echo render("department_update_view", $data);
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){

    update('department',$_POST);
    header("Location: ". DOMAIN_NAME. "/department/detail/$_POST[id]");
    exit();
}

?>

