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
        	<?php if (isset($edit_profile)):?>
			<li class="active">
            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 
					<?php echo get_phrase('edit_patient');?>
                    	</a></li>
            <?php endif;?>
			<li class="<?php if (!isset($edit_profile) && !isset($patient_history))echo 'active';?>">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase('patient_list');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					<?php echo get_phrase('add_patient');?>
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
                                <label class="control-label"><?php echo get_phrase('name');?></label>
                                <div class="controls view_profile">
                                    <?php echo $row['name'];?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('email');?></label>
                                <div class="controls view_profile">
                                    <?php echo $row['email'];?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('address');?></label>
                                <div class="controls view_profile">
                                    <?php echo $row['address'];?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('phone');?></label>
                                <div class="controls view_profile">
                                    <?php echo $row['phone'];?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('sex');?></label>
                                <div class="controls view_profile">
                                	<?php echo $row['sex'];?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('birth_date');?></label>
                                <div class="controls view_profile">
                                    <?php echo $row['birth_date'];?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('age');?></label>
                                <div class="controls view_profile">
                                    <?php echo $row['age'];?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('blood_group');?></label>
                                <div class="controls view_profile">
                                	<?php echo $row['blood_group'];?>
                                </div>
                            </div>
                            
                            <!--PATIENT PRESCRIPTION HISTORY LIST-->
                            <h4><?php echo get_phrase('prescription_history');?></h4>
                            <table cellpadding="0" cellspacing="0" border="0" class="table responsive">
                                <thead>
                                    <tr>
                                        <th><div>#</div></th>
                                        <th><div><?php echo get_phrase('date');?></div></th>
                                        <th><div><?php echo get_phrase('patient');?></div></th>
                                        <th><div><?php echo get_phrase('doctor');?></div></th>
                                        <th><div><?php echo get_phrase('options');?></div></th>
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
                                                rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('edit');?>" class="btn btn-blue">
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
            
            <!----EDITING FORM STARTS---->
        	<?php if(isset($edit_profile)):?>
			<div class="tab-pane box active" id="edit" style="padding: 5px">
                <div class="box-content">
                	<?php foreach($edit_profile as $row):?>
                    <?php echo form_open('doctor/manage_patient/edit/do_update/'.$row['patient_id'] , array('class' => 'form-horizontal validatable', 'enctype' => 'multipart/form-data'));?>
                        <div class="padded">
                        	<div class="control-group">
                                <label class="control-label"><?php echo get_phrase('photo');?></label>
                                <div class="controls" style="width:210px;">
                                    <input type="file" class="" name="userfile" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('name');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="name" value="<?php echo $row['name'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('email');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="email" value="<?php echo $row['email'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('password');?></label>
                                <div class="controls">
                                    <input type="password" class="validate[required]" name="password" value="<?php echo $row['password'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('address');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="address" value="<?php echo $row['address'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('phone');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="phone" value="<?php echo $row['phone'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('sex');?></label>
                                <div class="controls">
                                    <select name="sex" class="uniform" style="width:100%;">
                                    	<option value="male" <?php if($row['sex']=='male')echo 'selected';?>><?php echo get_phrase('male');?></option>
                                    	<option value="female" <?php if($row['sex']=='female')echo 'selected';?>><?php echo get_phrase('female');?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('birth_date');?></label>
                                <div class="controls">
                                    <input type="date" class="" name="birth_date" value="<?php echo $row['birth_date'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('age');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="age" value="<?php echo $row['age'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('blood_group');?></label>
                                <div class="controls">
                                    <select name="blood_group" class="uniform" style="width:100%;">
                                    	<option value="A+" <?php if($row['blood_group']=='A+')echo 'selected';?>>A+</option>
                                        <option value="A-" <?php if($row['blood_group']=='A-')echo 'selected';?>>A-</option>
                                        <option value="B+" <?php if($row['blood_group']=='B+')echo 'selected';?>>B+</option>
                                        <option value="B-" <?php if($row['blood_group']=='B-')echo 'selected';?>>B-</option>
                                        <option value="AB+" <?php if($row['blood_group']=='AB+')echo 'selected';?>>AB+</option>
                                        <option value="AB-" <?php if($row['blood_group']=='AB-')echo 'selected';?>>AB-</option>
                                        <option value="O+" <?php if($row['blood_group']=='O+')echo 'selected';?>>O+</option>
                                        <option value="O-" <?php if($row['blood_group']=='O-')echo 'selected';?>>O-</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-blue"><?php echo get_phrase('edit_patient');?></button>
                        </div>
                    <?php echo form_close();?>
                    <?php endforeach;?>
                </div>
			</div>
            <?php endif;?>
            <!----EDITING FORM ENDS--->
            
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box <?php if (!isset($edit_profile) && !isset($patient_history))echo 'active';?>" id="list">
				
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('patient_name');?></div></th>
                    		<th><div><?php echo get_phrase('age');?></div></th>
                    		<th><div><?php echo get_phrase('sex');?></div></th>
                    		<th><div><?php echo get_phrase('blood_group');?></div></th>
                    		<th><div><?php echo get_phrase('birth_date');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
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
                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('history');?>" class="btn btn-blue">
                                		<i class="icon-stethoscope"></i>
                                </a>
                            	<a href="<?php echo base_url();?>index.php?doctor/manage_patient/edit/<?php echo $row['patient_id'];?>"
                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('edit');?>" class="btn btn-blue">
                                		<i class="icon-wrench"></i>
                                </a>
                            	<a href="<?php echo base_url();?>index.php?doctor/manage_patient/delete/<?php echo $row['patient_id'];?>" onclick="return confirm('delete?')"
                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('delete');?>" class="btn btn-red">
                                		<i class="icon-trash"></i>
                                </a>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open('doctor/manage_patient/create/' , array('class' => 'form-horizontal validatable', 'enctype' => 'multipart/form-data'));?>
                        <div class="padded">
                        	<div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls" style="width:210px;">
                                    <div class="avatar">
                                    	<img id="blah" class="avatar-large" src="<?php echo $this->crud_model->get_image_url('patient',$row['patient_id']);?>" height="100"  />
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('photo');?></label>
                                <div class="controls" style="width:210px;">
                                    <input type="file" class="" name="userfile" id="imgInp" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('name');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="name"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('email');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="email"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('password');?></label>
                                <div class="controls">
                                    <input type="password" class="validate[required]" name="password"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('address');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="address"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('phone');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="phone"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('sex');?></label>
                                <div class="controls">
                                    <select name="sex" class="uniform" style="width:100%;">
                                    	<option value="male"><?php echo get_phrase('male');?></option>
                                    	<option value="female"><?php echo get_phrase('female');?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('birth_date');?></label>
                                <div class="controls">
                                    <input type="date" class="" name="birth_date"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('age');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="age"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('blood_group');?></label>
                                <div class="controls">
                                    <select name="blood_group" class="uniform" style="width:100%;">
                                    	<option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-blue"><?php echo get_phrase('add_patient');?></button>
                        </div>
                    <?php echo form_close();?>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
            
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