<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="">
<title>Indira Gandhi Agricultural University</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="<?php echo base_url();?>style/layout.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>style/navi.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>style/forms.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>style/tables.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>script/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>script/igau.js"></script>
</head>
<body id="top">
<div class="wrapper col1">
  <div id="header">
    <div id="igau_logo"><img src="<?php echo base_url();?>image/igau_logo.png"></div>
    <div id="logo">
     <h1><a href="#"><?php echo strtoupper('Nehru Library'); ?></a></h1>
       <p><strong class='new_h'>Indira Gandhi Krishi Vishwavidyalaya</strong></p>
      <p>Krishak Nagar, Raipur, Chhattisgarh 492012</p>
    </div>
    <?php
    if($this->session->userdata('is_logged_in'))
		{
                  ?>
    <div id="newsletter">
      <a href="<?php echo base_url();?>welcome/logout"> Signout</a>
    </div>
    <?php
        }
        ?>
    <br class="clear" />
  </div>
</div>
