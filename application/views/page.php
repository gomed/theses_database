

<div class="wrapper col3">
  <div id="intro">
  <center>
    <h2> Search </h2>
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
    
        <input type="text" name="search_key" placeholder="Project title Or Name" >
                      
           
            <input type="submit" name="submit" >
    </form>
  </center>
  <div id ="">
    <?php
    foreach($result as $val)
    {
        echo "<b> Name: </b>".strtoupper($val->name);
        echo "<Br/>";
        echo "<b> Project Title: </b>".strtoupper($val->title);
        echo "<Br/>";
      
        echo "<b> Download: </b><a href =".$val->path." target ='blank'>".$val->path."</a>";
        echo "<hr/>";
    }
    ?>
    <input type="hidden" id="url" value="<?php echo base_url();?>">
    
  </div>
  </div>
</div>


