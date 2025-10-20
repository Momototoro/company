<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET'){

    $data = findById($id,'department');
    if ($data['is_hiring']){
        $checked = 'checked';
    }else{
        $checked = '';
    }
    $work_mode = $data['work_mode'];
    require_once "../view/department/update.php";
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){

    update('department',$_POST);
    header("Location: ". DOMAIN_NAME. "/department/detail/$_POST[id]");
    exit();
}

?>

