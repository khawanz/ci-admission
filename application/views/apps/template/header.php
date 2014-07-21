<html>
    <head>
        <title><?php echo $title ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/assets/css/mystyle.css">
         <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/assets/javascript/jquery-ui-timepicker/jquery-ui-timepicker.css">
                 
        <script src="<?php echo base_url();?>/assets/javascript/jquery.tools.min.js"></script>
        <link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<link rel="stylesheet" media="all" type="text/css" href="jquery-ui-timepicker-addon.css" />
        <!-- dateinput styling -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/date.css">
        
    </head>

<div id="header">
    <a href="<?php echo base_url()?>home"><img src="<?php echo base_url();?>/assets/images/logo_UB.gif" /></a>

    <span id="header-title"> Admission </span>

</div>
    
    <?php if($this->session->flashdata('flashSuccess')):?>
<p class='flashMsg flashSuccess'> <?php $this->session->flashdata('flashSuccess')?> </p>
<?php endif?>
 
<?php if($this->session->flashdata('flashError')):?>
<p class='flashMsg flashError'> <?php $this->session->flashdata('flashError')?> </p>
<?php endif?>
 
<?php if($this->session->flashdata('flashInfo')):?>
<p class='flashMsg flashInfo'> <?php $this->session->flashdata('flashInfo')?> </p>
<?php endif?>
 
<?php if($this->session->flashdata('flashWarning')):?>
<p class='flashMsg flashWarning'> <?php $this->session->flashdata('flashWarning')?> </p>
<?php endif;
    
 

 
