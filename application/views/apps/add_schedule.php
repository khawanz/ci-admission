<link rel='stylesheet' media='all' type='text/css' href='http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css' />
<link rel='stylesheet' media='all' type='text/css' href='<?php echo base_url(); ?>/assets/css/jquery-ui-timepicker-addon.css' />
<div id='breadcrumb'>
    <a href='#'>schedule</a> » add-schedule
</div>     
<div class='menu-div'>
    <a href='<?php echo base_url(); ?>schedule'><div class='menu-list'>List</div></a>
    <a href='#'><div class='menu-list'>Add</div></a>
</div>

<div id='container'>           
                  
            <div id='content-container'>
<!--                    <div id='section-navigation'>
                            <ul>
                                  
                            </ul>
                    </div>-->
                    <div id='content'>
                        <?php echo validation_errors();?>
                        
                        <?php 
                        $attributes = array('class' => 'basic-grey');
                        echo form_open('schedule/create',$attributes) ?>
                        <h1>Add Schedule
                            <span>Please fill all the texts in the fields.</span>
                        </h1>
                        <label>
                            <span>Gelombang :</span>
                            <select name="gelombang">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                            <!--<input id='name' type='text' name='name' placeholder='Your Full Name' />-->
                        </label>
                            
                          <!--http://jquerytools.org/documentation/dateinput/-->                        
                        <label>
                            <span>Tanggal Test :</span>
                            <input type='date' name="tanggal"/>
                        </label>                  
                        
                        <!--http://runnable.com/UgCgGBRfEwILAAEt/how-to-create-date-time-picker-using-jquery-ui-->
                        <label>
                            <span>Jam Mulai :</span>
                            <input type='text' value='' class='time' name='time1' />
                        </label> 
                        <label>
                            <span>Jam Selesai :</span>
                            <input type='text' value='' class='time' name='time2' />
                        </label> 

                        <label>
                            <span>Tempat Test :</span>
                            <input type='text' name="tempat"/>
                        </label> 
                        <label>
                            <span>Alamat :</span>
                            <textarea id='message' name='alamat' placeholder='Test Address'></textarea>
                        </label>
                        <label>
                            <span>Kota :</span>
                            <input type='text' name="kota"/>
                        </label> 
                       
                        <label>
                            <span>Kapasitas :</span>
                            <input type='text' name="kapasitas"/>
                        </label>
                        <label>
                            <span>Penyerahan Dokumen :</span>
                            <input type='date' name="dokumen"/>
                        </label>
                        <label>
                            <span>Konfirmasi USM :</span>
                            <input type='date' name="konfirmasi"/>
                        </label>
                        
                         <label>
                            <span>Status :</span>
                            <select name="status">
                                <option>Open</option>
                                <option>Closed</option>                                
                            </select>
                            
                        </label>
                        
                         <label>
                            <span>&nbsp;</span>
                            <input type='submit' class='button' value='Submit' />
                        </label> 
                        <script>
                            $(':date').dateinput();
                        </script>
                                               
                        </form>
                            
                        
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
