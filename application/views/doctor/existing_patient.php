<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
        	<?php if (isset($patient_history)):?>
			<li class="active">
            	<a href="#patient_history" data-toggle="tab"><i class="icon-stethoscope"></i> 
					<?php echo get_phrase('patient_history');?>
                    	</a></li>
            <?php endif;?>
        	
			<li class="<?php if (!isset($edit_profile) && !isset($patient_history))echo 'active';?>">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase('patient_list');?>
                    	</a></li>
			
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
        
        	<!----PATIENT HISTORY STARTS---->
        	<?php if(isset($patient_history)):?>
			<div class="tab-pane box active" id="patient_history" style="padding: 5px">
                <div class="box-content">
                	<?php foreach($patient_history as $row):?>
                    <?php echo form_open('doctor/manage_patient/edit/do_update/'.$row['patient_id'] , array('class' => 'form-horizontal validatable'));?>
                        
                        <style>
						.view_profile{
							padding-top:6px;
						}
						</style>
                        
                        <div class="padded">
                        	<div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls" style="width:210px;">
                                    <div class="avatar">
                                    	<img  class="avatar-large" src="<?php echo $this->crud_model->get_image_url('patient',$row['patient_id']);?>" height="100"  />
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase(' Name');?></label>
                                <div class="controls view_profile">
                                    <?php echo $row['name'];?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase(' Email');?></label>
                                <div class="controls view_profile">
                                    <?php echo $row['email'];?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase(' Address');?></label>
                                <div class="controls view_profile">
                                    <?php echo $row['address'];?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase(' Phone');?></label>
                                <div class="controls view_profile">
                                    <?php echo $row['phone'];?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase(' Sex');?></label>
                                <div class="controls view_profile">
                                	<?php echo $row['sex'];?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase(' Birth_Date');?></label>
                                <div class="controls view_profile">
                                    <?php echo $row['birth_date'];?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase(' Age');?></label>
                                <div class="controls view_profile">
                                    <?php echo $row['age'];?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase(' Blood_Group');?></label>
                                <div class="controls view_profile">
                                	<?php echo $row['blood_group'];?>
                                </div>
                            </div>
                            
                            <!--PATIENT PRESCRIPTION HISTORY LIST-->
                            <h4><?php echo get_phrase(' Prescription_History');?></h4>
                            <table cellpadding="0" cellspacing="0" border="0" class="table responsive">
                                <thead>
                                    <tr>
                                        <th><div>#</div></th>
                                        <th><div><?php echo get_phrase(' Date');?></div></th>
                                        <th><div><?php echo get_phrase(' Patient');?></div></th>
                                        <th><div><?php echo get_phrase(' Doctor');?></div></th>
                                        <th><div><?php echo get_phrase(' Options');?></div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
									$count = 1;
									$current_patient_prescriptions	=	$this->db->get_where('prescription' , array('patient_id'=>$row['patient_id']) )->result_array();
									foreach($current_patient_prescriptions as $row2):?>
                                    <tr>
                                        <td><?php echo $count++;?></td>
                                        <td><?php echo date('d M,Y', $row['creation_timestamp']);?></td>
                                        <td><?php echo $this->crud_model->get_type_name_by_id('patient',$row2['patient_id'],'name');?></td>
                                        <td><?php echo $this->crud_model->get_type_name_by_id('doctor',$row2['doctor_id'],'name');?></td>
                                        <td align="center">
                                            <a href="<?php echo base_url();?>index.php?doctor/manage_prescription/edit/<?php echo $row2['prescription_id'];?>"
                                                rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase(' Edit');?>" class="btn btn-blue">
                                                    <i class="icon-wrench"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                
                        </div>
                    <?php echo form_close();?>
                    <?php endforeach;?>
                </div>
			</div>
            <?php endif;?>
            <!----PATIENT HISTORY ENDS--->
          
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box <?php if (!isset($edit_profile) && !isset($patient_history))echo 'active';?>" id="list">
				
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase(' Patient_Name');?></div></th>
                    		<th><div><?php echo get_phrase(' Age');?></div></th>
                    		<th><div><?php echo get_phrase(' Sex');?></div></th>
                    		<th><div><?php echo get_phrase('Blood_Group');?></div></th>
                    		<th><div><?php echo get_phrase(' Birth_Date');?></div></th>
                    		<th><div><?php echo get_phrase(' Options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($patients as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['age'];?></td>
							<td><?php echo $row['sex'];?></td>
							<td><?php echo $row['blood_group'];?></td>
							<td><?php echo $row['birth_date'];?></td>
							<td align="center">
                            	<a href="<?php echo base_url();?>index.php?doctor/manage_patient/patient_history/<?php echo $row['patient_id'];?>"
                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase(' History');?>" class="btn btn-blue">
                                		<i class="icon-stethoscope"></i>
                                </a>
                            	<a href="<?php echo base_url();?>index.php?doctor/manage_patient/edit/<?php echo $row['patient_id'];?>"
                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase(' Disgnose Pneumonia');?>" class="btn btn-blue">
                                		<i class="icon-ambulance"></i>
                                </a>
                            	
                                </a>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
		</div>
	</div>
</div>


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
</script>