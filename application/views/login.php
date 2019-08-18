<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
    <head>
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
		<?php include 'includes.php';?>
        <title><?php echo get_phrase(' Login');?> | <?php echo $system_title;?></title>
    </head>
	<body>
		<?php if($this->session->flashdata('flash_message') != ""):?>
 		<script>
			$(document).ready(function() {
				Growl.info({title:"<?php echo $this->session->flashdata('flash_message');?>",text:" "})
			});
		</script>
        <?php endif;?>
        <div class="navbar navbar-top navbar-inverse">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="brand" href="<?php echo base_url();?>"><?php echo $system_name;?></a>
                    
                    <ul class="nav pull-right">
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Select Language <b class="caret"></b></a>
                        <!-- Language Selector -->
                            <ul class="dropdown-menu">
                                <?php
                                $fields = $this->db->list_fields('language');
                                foreach ($fields as $field)
                                {
                                    if($field == 'phrase_id' || $field == 'phrase')continue;
                                    ?>
                                        <li>
                                            <a href="<?php echo base_url();?>index.php?multilanguage/select_language/<?php echo $field;?>">
                                                <?php echo $field;?>
                                                <?php //selecting current language
                                                    if($this->session->userdata('current_language') == $field):?>
                                                        <i class="icon-ok"></i>
                                                <?php endif;?>
                                            </a>
                                        </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        <!-- Language Selector -->
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
        <div class="container">
            <div class="span4 offset4">
                <div class="padded">
                  
                    <div class="login box" style="margin-top: 120px;">
                        <div class="box-header">
                            <span class="title"  style="margin-left:130px;"><?php echo get_phrase(' Sign-In');?></span>
                        </div>
                        <div class="box-content padded">
                        <i class="m-icon-swapright m-icon-white"></i>
                        	<?php echo form_open('login' , array('class' => 'separate-sections'));?>
                                <div class="">
                                    
                                    <select class="validate[required]" name="login_type" style="width:100%;">
                                        <option value=""><?php echo get_phrase(' Account_Type');?></option>
                                        <option value="admin"><?php echo get_phrase(' Admin');?></option>
                                        <option value="doctor"><?php echo get_phrase(' Doctor');?></option>
                                    </select>
    
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on" href="#">
                                    <i class="icon-envelope"></i>
                                    </span>
                                    <input name="email" type="text" placeholder="<?php echo get_phrase(' Email');?>">
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on" href="#">
                                    <i class="icon-key"></i>
                                    </span>
                                    <input name="password" type="password" placeholder="<?php echo get_phrase(' Password');?>">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-blue btn-block" >
                                        <?php echo get_phrase(' Sign-In');?>
                                    </button>
                                </div>
                            <?php echo form_close();?>
                            <div>
                                <a  data-toggle="modal" href="#modal-simple">
                                   <p style="margin-left: 105px;"> <?php echo get_phrase(' Forgot_Password?');?></p>
                                </a>
                            </div>
                            <div>
                                <a  data-toggle="modal" href="#modal-simplee">
                                   <p style="margin-left:90px;"> <?php echo get_phrase(' Not Regsitered? Sign-Up');?></p>
                                </a>
                            </div>

                        </div>
                    </div>
                    <?php include 'application/views/footer.php';?>
                </div>
            </div>
        </div>
        
        <!-----------password reset form ------>
        <div id="modal-simple" class="modal hide fade">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h6 id="modal-tablesLabel"  style="margin-left:200px;"><?php echo get_phrase(' Reset_Password');?></h6>
          </div>
          <div class="modal-body">
            <?php echo form_open('login/reset_password');?>
            	<select class="validate[required]" name="account_type"  style="margin-bottom: 0px !important;">
                    <option value=""><?php echo get_phrase(' Account_Type');?></option>
                    <option value="admin"><?php echo get_phrase(' Admin');?></option>
                    <option value="doctor"><?php echo get_phrase(' Doctor');?></option>
                </select>
                <input type="email"  style="margin-left:20px;" name="email"  placeholder="<?php echo get_phrase(' Email');?>"  style="margin-bottom: 0px !important;"/>
                <input type="submit" style="margin-left:200px; margin-top:15PX;" value="<?php echo get_phrase(' Reset_Password');?>"  class="btn btn-blue btn-medium"/>
            <?php echo form_close();?>
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-----------password reset form ------>

        <!-----------Sign Up Form------>
<div id="modal-simplee" class="modal hide fade" >
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h5 id="modal-tablesLabel" style="margin-left: 230px; color:black;"><?php echo get_phrase(' Sign-Up');?></h5>
          </div>
          <div class="modal-body">

        <div class="container" style="margin-top: -27px; ">
            <div class="span4">
                <div class="padded">
                    <div class="login box">
                        <div class="box-header">
                            <span class="title" style="margin-left: 125px;height:10px; color:black;"><h4 style="color:black;margin-top:-5px;"><?php echo get_phrase(' Sign-Up');?></h4></span>
                        </div>
                        <div class="box-content padded">
                        <i class="m-icon-swapright m-icon-white"></i>
                        <?php echo form_open('login/register' , array('class' => 'separate-sections'));?>
                                <div style="margin-top:-10px;">
                                    
                                    <select class="validate[required]" name="login_type" style="width:100%;">
                                        <option value="doctor"><?php echo get_phrase(' Doctor');?></option>
                                    </select>
    
                                </div>
                                <div class="input-prepend" style="margin-top:7px;">
                                    <span class="add-on" href="#">
                                    <i class="icon-envelope"></i>
                                    </span>
                                    <input name="name" type="text" placeholder="<?php echo get_phrase(' Name');?>">
                                </div>
                                <div class="input-prepend" style="margin-top:7px;">
                                    <span class="add-on" href="#">
                                    <i class="icon-envelope"></i>
                                    </span>
                                    <input name="email" type="text" placeholder="<?php echo get_phrase(' Email Address');?>">
                                </div>
                                <div class="input-prepend" style="margin-top:7px;">
                                    <span class="add-on" href="#">
                                    <i class="icon-key"></i>
                                    </span>
                                    <input name="password" type="password" placeholder="<?php echo get_phrase(' Password');?>">
                                </div>
                                <div class="input-prepend" style="margin-top:6px;">
                                    <span class="add-on" href="#">
                                    <i class="icon-key"></i>
                                    </span>
                                    <input name="c_password" type="password" placeholder="<?php echo get_phrase(' Confirm Password');?>">
                                </div>
                                <div class="input-prepend" style="margin-top:6px;">
                                    <span class="add-on" href="#">
                                    <i class="icon-phone"></i>
                                    </span>
                                    <input name="phone" type="text" placeholder="<?php echo get_phrase(' Phone Number');?>">
                                </div>
                                <div class="input-prepend" style="margin-top:6px;">
                                    <span class="add-on" href="#">
                                    <i class="icon-phone"></i>
                                    </span>
                                    <input name="address" type="text" placeholder="<?php echo get_phrase(' Address');?>">
                                </div>
                                <div class="input-prepend" style="margin-top:6px;">
                                    <span class="add-on" href="#">
                                    <i class="icon-phone"></i>
                                    </span>
                                    <input name="profile" type="text" placeholder="<?php echo get_phrase(' Profile');?>">
                                </div>

                                <div  style="margin-top:6px;">
                                    <button type="submit" class="btn btn-blue btn-block">
                                        <?php echo get_phrase(' Sign-up');?>
                                    </button>
                                </div>
                            <?php echo form_close();?>
        <!-----------Sign-up Form ------>
        
        
	</body>
</html>