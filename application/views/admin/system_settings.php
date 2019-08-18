<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">

			<li class="<?php if(!isset($edit_profile))echo 'active';?>">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase(' System_Settings');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
        	<!----EDITING FORM STARTS---->
			<div class="tab-pane box active" id="edit" style="padding: 5px">
                <div class="box-content padded">
                		<!--SYSTEM NAME-->
                		<?php echo form_open('admin/system_settings/system_name/do_update/' , array('class' => 'form-horizontal validatable'));?>                            
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase(' System_Name');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="description" 
                                    	value="<?php echo $this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;?>"/>
                                    <button type="submit" class="btn btn-blue"><?php echo get_phrase(' Save');?></button>
                                </div>
                            </div>
                        <?php echo form_close();?>
                        
                		<!--SYSTEM EMAIL-->
                		<?php echo form_open('admin/system_settings/system_email/do_update/' , array('class' => 'form-horizontal validatable'));?>                            
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase(' System_Email');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="description" 
                                    	value="<?php echo $this->db->get_where('settings' , array('type'=>'system_email'))->row()->description;?>"/>
                                    <button type="submit" class="btn btn-blue"><?php echo get_phrase(' Save');?></button>
                                </div>
                            </div>
                        <?php echo form_close();?>
                        
                		<!--SYSTEM TITLE-->
                		<?php echo form_open('admin/system_settings/system_title/do_update/' , array('class' => 'form-horizontal validatable'));?>                            
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase(' System_Title');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="description" 
                                    	value="<?php echo $this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;?>"/>
                                    <button type="submit" class="btn btn-blue"><?php echo get_phrase(' Save');?></button>
                                </div>
                            </div>
                        <?php echo form_close();?>
                        
                		<!--ADDRESS-->
                		<?php echo form_open('admin/system_settings/address/do_update/' , array('class' => 'form-horizontal validatable'));?>                            
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase(' Address');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="description" 
                                    	value="<?php echo $this->db->get_where('settings' , array('type'=>'address'))->row()->description;?>"/>
                                    <button type="submit" class="btn btn-blue"><?php echo get_phrase(' Save');?></button>
                                </div>
                            </div>
                        <?php echo form_close();?>
                        
                		<!--phone-->
                		<?php echo form_open('admin/system_settings/phone/do_update/' , array('class' => 'form-horizontal validatable'));?>                            
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase(' Phone');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="description" 
                                    	value="<?php echo $this->db->get_where('settings' , array('type'=>'phone'))->row()->description;?>"/>
                                    <button type="submit" class="btn btn-blue"><?php echo get_phrase(' Save');?></button>
                                </div>
                            </div>
                        <?php echo form_close();?>
                        
                	
                        
                		<!--default language-->
                		<?php echo form_open('admin/system_settings/language/do_update/' , array('class' => 'form-horizontal validatable'));?>                            
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase(' Language');?></label>
                                <div class="controls">
                                    <select name="description">
                                    	<?php
										$fields = $this->db->list_fields('language');
										foreach ($fields as $field)
										{
											if ($field == 'phrase_id' || $field == ' phrase')continue;
											
											$current_default_language	=	$this->db->get_where('settings' , array('type'=>'language'))->row()->description;
											?>
                                    		<option value="<?php echo $field;?>"
                                            	<?php if ($current_default_language == $field)echo 'selected';?>> <?php echo $field;?> </option>
                                            <?php
										}
										?>
                                    </select>
                                    <button type="submit" class="btn btn-blue"><?php echo get_phrase(' Save');?></button>
                                </div>
                            </div>
                        <?php echo form_close();?>      
                </div>
			</div>
            <!----EDITING FORM ENDS--->
            
		</div>
	</div>
</div>