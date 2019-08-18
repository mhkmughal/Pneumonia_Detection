<link rel="stylesheet" href="<?php echo base_url();?>template/css/font.css">
		<!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">-->
        
        <?php 
		$text_align	=	$this->db->get_where('settings' , array('type'=>'text_align'))->row()->description;
		if ($text_align == 'right-to-left')
			$css_file	=	'bayanno-rtl.css';
		if ($text_align == 'left-to-right')
			$css_file	=	'bayanno.css';
		
		?>
        <link href="<?php echo base_url();?>template/css/<?php echo $css_file;?>" media="screen" rel="stylesheet" type="text/css" />
        <!--[if lt IE 9]>
        <script src="<?php echo base_url();?>template/js/html5shiv.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>template/js/excanvas.js" type="text/javascript"></script>
        <![endif]-->
        <script src="<?php echo base_url();?>template/js/bayanno.js" type="text/javascript"></script>
        
        
        <?php
		//////////LOADING SYSTEM SETTINGS FOR ALL PAGES AND ACCOUNTS/////////
		
		$system_name	=	$this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
		$system_title	=	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;