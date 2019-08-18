o<div class="sidebar-background">
	<div class="primary-sidebar-background">
	</div>
</div>
<div class="primary-sidebar">
	<!-- Main nav -->
    <br />
    <div style="text-align:center;">
    	<a href="<?php echo base_url();?>">
        	<img src="<?php echo base_url();?>uploads/Favicon1.jpg"  style="max-height:100px; max-width:100px;"/>
        </a>
    </div>
   	<br />
	<ul class="nav nav-collapse collapse nav-collapse-primary">

        <!------dashboard----->
		<li class="<?php if($page_name == 'dashboard')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?Admin/dashboard" >
					<i class="icon-home icon-2x"></i>
					<span><?php echo get_phrase(' Dashboard');?></span>
				</a>
		</li>
        
        <!------Doctors ----->	
	<li class="dark-nav <?php if(	$page_name == 'manage_doctor' 	|| 
										$page_name == 'manage_requests'  )echo 'active';?>">
			<span class="glow"></span>
            <a class="accordion-toggle  " data-toggle="collapse" href="#view_submenu" >
                <i class="icon-user-md icon-2x"></i>
                <span><?php echo get_phrase(' Doctor');?><i class="icon-caret-down"></i></span>
            </a>
            
            <ul id="view_submenu" class="collapse <?php if(	$page_name == 'manage_doctor' 	|| 
																		$page_name == 'manage_requests'  )echo 'in';?>">
                <li class="<?php if($page_name == 'manage_doctor')echo 'active';?>">
                  <a href="<?php echo base_url();?>index.php?admin/manage_doctor">
                      <i class="icon-user"></i> <?php echo get_phrase(' Manage_Doctor');?>
                  </a>
                </li>
               
                <li class="<?php if($page_name == 'manage_requests')echo 'active';?>">
                  <a href="<?php echo base_url();?>index.php?admin/manage_requests">
                      <i class="icon-plus-sign"></i> <?php echo get_phrase(' Manage_Requests');?>
                  </a>
                </li>
            </ul>
		</li>
        
        <!------patient----->
		<li class="<?php if($page_name == 'manage_patient')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?admin/manage_patient" >
					<i class="icon-h-sign icon-2x"></i>
					<span><?php echo get_phrase(' Patients');?></span>
				</a>
		</li>
       
		<!------manage hospital------>
		<li class="dark-nav <?php if(	$page_name == 'view_appointment' 	|| 
										$page_name == 'view_report'  )echo 'active';?>">
			<span class="glow"></span>
            <a class="accordion-toggle  " data-toggle="collapse" href="#view_hospital_submenu" >
                <i class="icon-screenshot icon-2x"></i>
                <span><?php echo get_phrase(' History');?><i class="icon-caret-down"></i></span>
            </a>
            
            <ul id="view_hospital_submenu" class="collapse <?php if(	$page_name == 'view_appointment' 	|| 
																		$page_name == 'view_medicine' 		|| 
																		$page_name == 'view_report'  )echo 'in';?>">
                <li class="<?php if($page_name == 'view_appointment')echo 'active';?>">
                  <a href="<?php echo base_url();?>index.php?admin/view_appointment">
                      <i class="icon-exchange"></i> <?php echo get_phrase(' View_Appointment');?>
                  </a>
                </li>
               
            </ul>
		</li>
        
        
        <!------system settings------>
		<li class="dark-nav <?php if(	$page_name == 'manage_email_template' 	|| 
										$page_name == 'manage_noticeboard' 		||
										$page_name == 'system_settings' 		|| 
										$page_name == 'manage_language' 		|| 
										$page_name == 'backup_restore' )echo 'active';?>">
			<span class="glow"></span>
            <a class="accordion-toggle  " data-toggle="collapse" href="#settings_submenu" >
                <i class="icon-wrench icon-2x"></i>
                <span><?php echo get_phrase(' Settings');?><i class="icon-caret-down"></i></span>
            </a>
            
            <ul id="settings_submenu" class="collapse <?php if(	$page_name == 'manage_email_template' 	|| 
																$page_name == 'manage_noticeboard' 		||
																$page_name == 'system_settings' 		|| 
																$page_name == 'manage_language' 		|| 
																$page_name == 'backup_restore' )echo 'in';?>">
                <!--<li class="<?php if($page_name == 'manage_email_template')echo 'active';?>">
                  <a href="<?php echo base_url();?>index.php?admin/manage_email_template">
                      <i class="icon-envelope"></i> <?php echo get_phrase('manage_email_template');?>
                  </a>
                </li>-->
                <li class="<?php if($page_name == 'manage_noticeboard')echo 'active';?>">
                  <a href="<?php echo base_url();?>index.php?admin/manage_noticeboard">
                      <i class="icon-columns"></i> <?php echo get_phrase(' Manage_Noticeboard');?>
                  </a>
                </li>
                <li class="<?php if($page_name == 'system_settings')echo 'active';?>">
                  <a href="<?php echo base_url();?>index.php?admin/system_settings">
                      <i class="icon-cog"></i> <?php echo get_phrase(' System_Settings');?>
                  </a>
                </li>
            </ul>
		</li>

		<!------manage own profile--->
		<li class="<?php if($page_name == 'manage_profile')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?admin/manage_profile" >
					<i class="icon-lock icon-2x"></i>
					<span><?php echo get_phrase(' Profile');?></span>
				</a>
		</li>
		
	</ul>
	
</div>