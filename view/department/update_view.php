<?php
function department_update_view(array $data): string {
    return "<form action='' method='post'>
    <label>Name:
        <input type='text' name='name' value='{$data['name']}'>
    </label><br>
    <label>Hiring
        <input type='checkbox' name='is_hiring' value='1'  {$data['checked']} >
    </label><br>
    <label>OnSite
        <input type='radio' name='work_mode' value='onsite' " .(($data['work_mode'] === 'onsite') ?  'checked' : ''). ">
    </label><br>
    <label>Remote
        <input type='radio' name='work_mode' value='remote' " .(($data['work_mode'] === 'remote') ?  'checked' : ''). ">
    </label><br>
    <label>Hybrid
        <input type='radio' name='work_mode' value='hybrid' " .(($data['work_mode'] === 'hybrid') ?  'checked' : ''). " >
    </label><br>
    <input type='hidden' name='id' value='{$data['id']}'>
    <input type='submit'>
</form>";
}