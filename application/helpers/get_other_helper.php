<?php
function get_select_other_field_from_key($table,$field_search,$pk,$this_val){
    $ci = get_instance();
    $value = "<select name='$pk' class='form-control'>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $value .="<option value='".$d->$pk."'";
        $value .= $this_val==$d->$pk?" selected='selected'":'';
        $value .=">".  strtoupper($d->$field_search)."</option>";
    }
    $value .="</select>";
    return $value;  
}

