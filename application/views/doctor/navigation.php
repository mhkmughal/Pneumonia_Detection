<div class="sidebar-background">
	<div class="primary-sidebar-background">
	</div>
</div>
<div class="primary-sidebar">
	<!-- Main nav -->
    <br />
    <div style="text-align:center;">
    	<a href="<?php echo base_url();?>">
        	<img src="<?php echo base_url();?>uploads/.png"  style="max-height:100px; max-width:100px;"/>
        </a>
    </div>
   	<br />
	<ul class="nav nav-collapse collapse nav-collapse-primary">
    
        
        <!------dashboard----->
		<li class="<?php if($page_name == 'dashboard')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?doctor/dashboard" >
					<i class="icon-home icon-2x"></i>
					<span><?php echo get_phrase(' Dashboard');?></span>
				</a>
		</li>
		<!------Pneumonia----->
	
	<li class="dark-nav <?php if(	$page_name == 'existing_patient' 	|| 
										$page_name == 'new_patient'  )echo 'active';?>">
										<span class="glow"></span>
										<a class="accordion-toggle  " data-toggle="collapse" href="#view_submenu" >
											<i class="icon-medkit icon-2x"></i>
											<span><?php echo get_phrase(' Pneumonia Diagnosis');?><i class="icon-caret-down"></i></span>
										</a>
										
										<ul id="view_submenu" class="collapse <?php if(	$page_name == 'existing_patient' 	|| 
																									$page_name == 'new_patient'  )echo 'in';?>">
											<li class="<?php if($page_name == 'existing_patient')echo 'active';?>">
											  <a href="<?php echo base_url();?>index.php?doctor/existing_patient">
												  <i class="icon-heart"></i> <?php echo get_phrase(' Existing_Patient');?>
											  </a>
											</li>
										   
											<li class="<?php if($page_name == 'new_patient')echo 'active';?>">
											  <a href="<?php echo base_url();?>index.php?doctor/new_patient">
												  <i class="icon-plus-sign"></i> <?php echo get_phrase(' New_Patient');?>
											  </a>
										</li>
						</ul>
				</li>				
					
        <!------patient----->
		<li class="<?php if($page_name == 'manage_patient')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?doctor/manage_patient" >
					<i class="icon-h-sign icon-2x"></i>
					<span><?php echo get_phrase(' Patient');?></span>
				</a>
		</li>
        
        <!------appointment----->
		<li class="<?php if($page_name == 'manage_appointment')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?doctor/manage_appointment" >
					<i class="icon-edit icon-2x"></i>
					<span><?php echo get_phrase(' Appointments');?></span>
				</a>
		</li>
        
		<!------manage report--->
		<li class="<?php if($page_name == 'manage_report')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?doctor/manage_report" >
					<i class="icon-hospital icon-2x"></i>
					<span><?php echo get_phrase(' Manage_Report');?></span>
				</a>
		</li>

		<!------manage own profile--->
		<li class="<?php if($page_name == 'manage_profile')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?doctor/manage_profile" >
					<i class="icon-lock icon-2x"></i>
					<span><?php echo get_phrase(' Profile');?></span>
				</a>
		</li>
		
	</ul>
	
</div>