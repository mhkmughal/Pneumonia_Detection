<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
        	<?php if(isset($edit_profile)):?>
			<li class="active">
            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 
					<?php echo get_phrase(' Edit_doctor');?>
                    	</a></li>
            <?php endif;?>
			<li class="<?php if(!isset($edit_profile))echo 'active';?>">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase(' Doctor_list');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
        	<!----EDITING FORM STARTS---->
        	<?php if(isset($edit_profile)):?>
			<div class="tab-pane box active" id="edit" style="padding: 5px">
                <div class="box-content">
                	<?php foreach($edit_profile as $row):?>
                    <?php echo form_open('admin/manage_doctor/edit/do_update/'.$row['doctor_id'] , array('class' => 'form-horizontal validatable'));?>
                        <div class="padded">
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
                                <label class="control-label"><?php echo get_phrase('department');?></label>
                                <div class="controls">
                                    <select name="department_id" class="uniform" style="width:100%;">
                                    	<?php 
										$departments = $this->db->get('department')->result_array();
										foreach($departments as $row2):
										?>
                                    		<option value="<?php echo $row2['department_id'];?>"
                                            	<?php if($row['department_id'] == $row2['department_id'])echo 'selected';?>>
													<?php echo $row2['name'];?>
                                                    	</option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('profile');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="profile" value="<?php echo $row['profile'];?>"/>
                                </div>
                            </div>

                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-blue"><?php echo get_phrase('edit_doctor');?></button>
                        </div>
                    <?php echo form_close();?>
                    <?php endforeach;?>
                </div>
			</div>
            <?php endif;?>
            <!----EDITING FORM ENDS--->
            
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box <?php if(!isset($edit_profile))echo 'active';?>" id="list">
				
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('  Doctor_Name');?></div></th>
                            <th><div><?php echo get_phrase(' Email Address');?></div></th>
                    		<th><div><?php echo get_phrase(' Phone_Number');?></div></th>
                    		<th><div><?php echo get_phrase(' Options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($registerations as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
                            <td><?php echo $row['email'];?></td>
							<td><?php echo $row['phone'];?></td>
							<td align="center">
                            	<a href="<?php echo base_url();?>index.php?admin/manage_requests/add/<?php echo $row['doctor_id'];?>"
                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase(' Accept');?>" class="btn btn-blue">
                                		<i class="icon-ok"></i>
                                </a>
                            	<a href="<?php echo base_url();?>index.php?admin/manage_requests/delete/<?php echo $row['reg_id'];?>" onclick="return confirm(' Delete?')"
                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase(' Reject');?>" class="btn btn-red">
                                		<i class="icon-remove"></i>
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