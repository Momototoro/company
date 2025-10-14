<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET'){

    $result = findById($id,'department');
    if ($result['is_hiring']){
        $checked = 'checked';
    }else{
        $checked = '';
    }
    $work_mode = $result['work_mode'];



    ?>
    <!doctype html>
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
    <form action='' method='post'>
        <label>Name:
            <input type='text' name='name' value='<?= $result['name'] ?>'>
        </label><br>
        <label>Hiring
            <input type='checkbox' name='is_hiring' value='1' <?= $checked ?>>
        </label><br>
        <label>OnSite
            <input type='radio' name='work_mode' value='onsite' <?= $work_mode === 'onsite' ?  'checked' : '' ?>>
        </label><br>
        <label>Remote
            <input type='radio' name='work_mode' value='remote'  <?= $work_mode === 'remote' ?  'checked' : '' ?>>
        </label><br>
        <label>Hybrid
            <input type='radio' name='work_mode' value='hybrid'  <?= $work_mode === 'hybrid' ?  'checked' : '' ?>>
        </label><br>
        <input type='hidden' name='id' value='<?= $result['id'] ?>'>
        <input type='submit'>
    </form>



    </body>
    </html>
    <?php
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){

    update('department',$_POST);
    header("Location: ". DOMAIN_NAME. '/department/read');
    exit();
}

?>

