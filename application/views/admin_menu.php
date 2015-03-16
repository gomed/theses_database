<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
      <ul>
        
        <?php
        if($this->session->userdata('is_logged_in'))
		{
                  ?>
                  <li class="active" ><a href="<?php echo base_url();?>welcome/login">Home</a></li>
		 
		  <li ><a href="<?php echo base_url();?>welcome/all_data_edit">All Data</a></li>
        <li><a href="<?php echo base_url();?>welcome/index">User Home</a></li>
	
        
        <?php
        }
        ?>
        
          <!-- <ul>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
          </ul> -->
        </li>
        <!-- <li class="last"><a href="#">A Long Link Text</a></li> -->
      </ul>
    </div>
    <br class="clear" />
  </div>
</div> 
