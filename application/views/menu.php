<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
      <ul>
        
        
                  <li class="active" ><a href="<?php echo base_url();?>welcome/index">Home</a></li>
                  <?php
    if($this->session->userdata('is_logged_in'))
		{
                  ?>
        <li><a href="<?php echo base_url();?>welcome/login">Upload</a></li>
        <?php
                }
                else
                {
                  ?>
                  
                 <!--   <li><a href="#">Full Width</a></li> -->
                   <?php
                }
                ?>
        
        <!--  <li><a href="#">DropDown</a>
          <!-- <ul>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
          </ul> 
        </li>
        <li class="last"><a href="#">A Long Link Text</a></li> -->
      </ul>
    </div>
    <br class="clear" />
  </div>
</div> 
