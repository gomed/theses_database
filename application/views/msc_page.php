<?php
//$reso_person = $_POST['reso_person'];
//echo "".$reso_person;
//echo "<select name='subject'>";
echo "<option value='' > Select </option>";
foreach($msc_subject as $val)
{
    echo "<option value=".$val->id." >".$val->subject_name."</option>";
}
//echo "</select>";
?>