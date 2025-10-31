
<?php
function employee_update_view(array $data): string {
    return "<form action='' method='post'>
    <input type='text' name='fname' placeholder='fname' value='{$data['fname']}'>
    <input type='text' name='lname' placeholder='lname' value='{$data['lname']}'>
    <input type='hidden' name='id' value='{$data['id']}'>
    <input type='submit'>
</form>";
}