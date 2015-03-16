<style>
#accession
{
  width:250px;
  float:left;
   position:absolute;
}
</style>

<div class="wrapper col3" >
  <div id="intro" class='search_h'>
  <center>
    <h2 > Thesis Search Engine</h2>
    <div id="accession">
      <form action="<?php echo base_url();?>welcome/accession_data" method="post">
    <input type ="text" style="width:100px;" placeholder="Accession No." maxlength="10" name="accession_no">
      <input type ="submit" value="Get Data">
      </form>
    </div>
    <form action="<?php echo base_url();?>welcome/search" method="post">
    
     <input type="radio" name="course" value="1" id="msc_course"> M.Sc./M.Tech<input type="radio" name="course" value="2" id="phd_course"> Ph.D.
    
    
    
   
    <select id="ms_auto" name='subject'  style="width:200px" onChange="search_subject(this.value);"> <option value='' > Select </option></select>   
    <?php
    echo "<select name='year' id='year' onChange= 'search_year(this.value);'>";
    echo "<option value=''> Year</option>";
    foreach($year as $val)
    {
        echo "<option value=".$val->id." > ".$val->year."</option>";
    }
    echo "</select>"
    ?>
    
    <br/>
    
        <input type="text" name="search_key" placeholder="Project title /Name/Guide Name" >
                      
           
            <input type="submit" name="submit" value ="Submit">
    </form>
  </center>
  <div id ="search_data">
    <?php
    if(isset($result))
    {
      if($result == NULL)
			{
				echo "<div id='search_data_body'>";
				echo "<p>Your search  did not match any documents.</P>";
				echo "</div";
			}
                        
      foreach($result as $val)
        {
          ?>
          <div id="search_data_body">
            <?php
            echo "<p> <b> Name: </b>".strtoupper($val->name)."</p>";           
            echo "<p> <b> Title: </b>".strtoupper($val->title)."</p>";
            echo "<p> <b> Degree: </b>".$val->course_name."<b> Subject: </b>".$val->subject_name."</p>";
            echo "<p> <b> Chairman: </b>".strtoupper($val->chairman)."<b> Members: </b>".strtoupper($val->members)."</p>";
            echo "<p> <b> Accession No.: </b>".$val->accession_no."<b> Class No.: </b>".$val->class_no."<b> Year: </b>".$val->year."</p>"; 
            echo "<p> <b> Download/View: </b><a href =",base_url().$val->path." target ='blank'>Click here</a> </p>";            
            ?>
            </div>
          <?php
        }
    }
    ?>
    
    <br/>
    <?php if(isset($link))
  {
    echo $link;    
  }
  ?>
  </div>
  
  </div>
</div>
    <input type="hidden" id="url" value="<?php echo base_url();?>">


