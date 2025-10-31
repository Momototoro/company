
<?php
function department_create_view(array $data = []){
    return "<form action='' method='post'>
    <label>Name:
        <input type='text' name='name' value=''>
    </label><br>
    <label>Hiring
        <input type='checkbox' name='is_hiring' value='1'>
    </label><br>
    <label>OnSite
        <input type='radio' name='work_mode' value='onsite' checked>
    </label><br>
    <label>Remote
        <input type='radio' name='work_mode' value='remote'>
    </label><br>
    <label>Hybrid
        <input type='radio' name='work_mode' value='hybrid'>
    </label><br>
    <input type='submit'>
</form>";
}