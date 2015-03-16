<style>
#accession
{
  width:250px;
  float:left;
  position:absolute;
}
</style>

<div class="wrapper col3">
  <div id="intro">
  <center>
    
    <h2 class='search_h'> Thesis Search Engine </h2>
    <div id="accession">
      <form action="<?php echo base_url();?>welcome/accession_data" method="post">
    <input type ="text" style="width:100px;" placeholder="Accession No." maxlength="10" name="accession_no">
      <input type ="submit" value="Get Data">
      </form>
    </div>
    <form action="<?php echo base_url();?>welcome/search" method="post">
    
     <input type="radio" name="course" value="M.Sc." id="msc_course"> M.Sc.<input type="radio" name="course" value="Ph.D." id="phd_course"> Ph.D.
    
    
    
   
    <select id="ms_auto" name='subject'> <option value=''> Select </option></select>
    
   
      <?php
    echo "<select name='year'>";
    echo "<option value=''> Year</option>";
    foreach($year as $val)
    {
        echo "<option value=".$val->year."> ".$val->year."</option>";
    }
    echo "</select>"
    ?>
    
    <br/>
    
        <input type="text" name="search_key" placeholder="Project title /Name/Guide Name"  >
                      
           
            <input type="submit" name="submit" >
    </form>
  </center>
  </div>
</div>


