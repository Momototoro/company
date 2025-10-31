<?php



# Das Ergebnis des SQLs in form eines nummerischen Arrays (fetchAll) mit assoziativen Arrays als Elementen (PDO::FETCH_ASSOC)  in eine variable
$data = findAll('employees');

//require_once "../view/employee/read_view.php";
echo render("employee_read_view", $data);
?>


