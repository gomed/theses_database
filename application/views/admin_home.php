

<div class="wrapper col3">
  <div id="intro" >
    
    <?php echo form_open_multipart('welcome/upload');?>
  <center>
    <?php if(isset($error)){echo $error;}?>
    <?php
    if(isset($success)){
        echo $success;
        echo "<br/>";
    }
    echo validation_errors(); 
    ?>
    <!-- <input type="radio" name="course" value="1" id="msc" checked> M.Sc.<input type="radio" name="course" value="2" id="phd"> Ph.D. 
     -->
     <input type="radio" name="course" value="1" id="msc_course" > M.Sc.<input type="radio" name="course" value="2" id="phd_course"> Ph.D.
     <select id="ms_auto" name='subject' style="width:200px"  required> <option value=''> Select </option></select> <select name="year" required> <option value="">
     Select Year</option><?php foreach($year as $row) {echo "<option value =".$row->id.">".$row->year."</option>";} ?></select>
    
    <input type="hidden" id="url" value="<?php echo base_url();?>">
     <!-- Admin Home Page -->
    
    <?php
   /* echo "<select name='msc_subject' id='msc_subject'>";
    echo "<option value=''> Select </option>";
    foreach($msc_subject as $val)
    {
      echo "<option value='".$val->id."'> ".$val->subject_name." </option>";
    }
    echo "</select>";
    ?>
    <?php
    echo "<select name='phd_subject' id='phd_subject'>";
    echo "<option value=''> Select </option>";
    foreach($phd_subject as $val)
    {
      echo "<option value='".$val->id."'> ".$val->subject_name." </option>";
    }
    echo "</select>"; */
    ?>
   
        <input type="file" name="userfile" required>
           <table>
             <tr> <td> Name: </td> 
            <td> <input type="text" name="name" size="80" value="<?php echo set_value('name'); ?>" required >
             Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <input type="text" name="project_title" size="80"  value="<?php echo set_value('project_title'); ?>" required></td>
             
             </tr>
            
            <tr> <td> Chairman </td><td>  <input type="text" name="chairman" size="80" value="<?php echo set_value('chairman'); ?>" required>
           </td></tr>
            <tr> <td> Members </td><td> <input type="text" name="members" size="80" value="<?php echo set_value('members'); ?>" required>
            Keywords <input type="text" name="keywords" size="80" value="<?php echo set_value('keywords'); ?>" required> </td>
            
            </tr>
            
            <tr> <td> Accession No. </td><td> <input type="text" name="accession_no" size="80" maxlength="8" class="" value="<?php echo set_value('accession_no'); ?>" required style="width:200px" >
              Class No. 
            <input type="text" name="class_no" size="80" maxlength="8" value="<?php echo set_value('class_no'); ?>" required style="width:200px" >
            </td>
            </tr>
            
            <tr> <td> Abstract </td><td> <textarea  name="abstract" cols ="80" rows="5" required  > <?php echo set_value('abstract'); ?> </textarea></td></tr>
            <tr> <td> </td><td>  <input type="submit" name="submit" ></td></tr>
            </table>
           
    </form>
  </center>
  </div>
</div>


