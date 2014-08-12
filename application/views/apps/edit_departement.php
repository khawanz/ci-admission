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
                        echo form_open('ub/update_departement',$attributes) ?>
                        <h1>Edit Departement</h1>                        

                        <input type='hidden' name="id" value="<?php echo $dep['dep_id']; ?>"/>
                        <label>
                            <span>Kode :</span>
                            <input type='text' name="kode_dep" value="<?php echo $dep['dep_code']; ?>"/>
                        </label> 
                        <label>
                            <span>Nama Departemen:</span>
                            <input type='text' name="nama_dep" value="<?php echo $dep['dep_name']; ?>"/>
                        </label>
<!--                        <label>
                            <span>Deskripsi :</span>
                            <input type='text' name="deskripsi"/>
                        </label> -->
                       <label>
                            <span>&nbsp;</span>
                            <button type='submit' name='updateForm' class='button' value='updateButton' >Update</button>   
                            <button type='submit' name='updateForm' class='button' value='cancelButton' >Cancel</button>   
                        </label>                         
                       <?php echo form_close(); ?>
                            
                        
                    </div>
<!--                    <div id='aside'>
                            
                    </div>-->
                   
            </div>
        </div>
    
