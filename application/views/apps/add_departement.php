<link rel='stylesheet' media='all' type='text/css' href='http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css' />
<link rel='stylesheet' media='all' type='text/css' href='<?php echo base_url(); ?>/assets/css/jquery-ui-timepicker-addon.css' />
<!--<div id='breadcrumb'>
    <a href='#'>schedule</a> » add-schedule
</div>     -->
<div class='menu-div'>
    <a href='<?php echo base_url(); ?>ub/departemen'><div class='menu-list'>List</div></a>
    <a href='#'><div class='menu-list'>Add</div></a>
</div>

<div id='container'>           
                  
            <div id='content-container'>
                    <div id='content'>
                        <?php echo validation_errors();?>
                        
                        <?php 
                        $attributes = array('class' => 'basic-grey');
                        echo form_open('ub/create_departement',$attributes) ?>
                        <h1>Add Departement
                            <span>Please fill all the texts in the fields.</span>
                        </h1>                        

                        <label>
                            <span>Kode :</span>
                            <input type='text' name="kode_dep"/>
                        </label> 
                        <label>
                            <span>Nama Departemen:</span>
                             <input type='text' name="nama_dep"/>
                        </label>
<!--                        <label>
                            <span>Deskripsi :</span>
                            <input type='text' name="deskripsi"/>
                        </label> -->
                       <label>
                            <span>&nbsp;</span>
                            <input type='submit' class='button' value='Submit' />
                        </label>                         
                       <?php echo form_close(); ?>
                            
                        
                    </div>
<!--                    <div id='aside'>
                            
                    </div>-->
                   
            </div>
        </div>
    
		<!--loading jQuery and other library-->
		<script type='text/javascript' src='http://code.jquery.com/jquery-1.10.1.min.js'></script>
		<script type='text/javascript' src='http://code.jquery.com/ui/1.10.3/jquery-ui.min.js'></script>
		<script type='text/javascript' src='<?php echo base_url();?>/assets/javascript/jquery-ui-timepicker-addon.js'></script>
		<script type='text/javascript' src='<?php echo base_url();?>/assets/javascript/jquery-ui-sliderAccess.js'></script>
		<script type='text/javascript' src='<?php echo base_url();?>/assets/javascript/script.js'></script>
