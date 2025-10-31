
<?php
function employee_create_view(array $data = []):string {
    return "<form action='' method='post'>
    <input type='text' name='fname' placeholder='fname'>
    <input type='text' name='lname' placeholder='lname'>
    <input type='submit'>
</form>";
}