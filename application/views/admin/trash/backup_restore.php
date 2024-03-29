<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#backup" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase(' Backup');?>
                    	</a></li>
			<li class="">
            	<a href="#restore" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase(' Restore');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">            
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box active span7" id="backup">
				<center>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-normal" >
                    <tbody>
                    	<?php 
						for($i = 1; $i<= 7; $i++):
						
							if($i	==	1)	$type	=	' Doctor';
							else if($i	==	2)$type	=	' Patient';
							else if($i	==	3)$type	=	' Accountant';
							else if($i	==	4)$type	=	' Appointment';
							else if($i	==	5)$type=	' Noticeboard';
							else if($i	==	6)$type=	' Language';
							else if($i	==	7)$type=	' All';
							?>
							<tr>
								<td><?php echo get_phrase($type);?></td>
								<td align="center">
									<a href="<?php echo base_url();?>index.php?admin/backup_restore/create/<?php echo $type;?>" 
										class="btn btn-default" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt" ></i>
											</a>
									<a href="<?php echo base_url();?>index.php?admin/backup_restore/delete/<?php echo $type;?>" 
										class="btn btn-default" rel="tooltip" data-original-title="delete data" onclick="return confirm(' Delete Confirm?');"><i class="icon-trash"></i>
											</a>
								</td>
							</tr>
							<?php 
						endfor;
						?>
                    </tbody>
                </table>
                </center>
			</div>
            <!----TABLE LISTING ENDS--->
            
            <!----RESTORE--->
            <div class="tab-pane box  span6" id="restore">

                <?php echo form_open('admin/backup_restore/restore' , array('enctype' => 'multipart/form-data'));?>
                    <input name="userfile" type="file" />
                    <br /><br />
                    <center><input type="submit" class="btn btn-blue" value="<?php echo get_phrase(' Upload_&_Restore_from_Backup');?>" /></center>
                    <br />
                <?php echo form_close();?>
			</div>
            <!----RESTORE ENDS--->
		</div>
	</div>
</div>