<link rel='stylesheet' media='all' type='text/css' href='http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css' />
<link rel='stylesheet' media='all' type='text/css' href='<?php echo base_url(); ?>/assets/css/jquery-ui-timepicker-addon.css' />
<div id='breadcrumb'>
    <a href='#'>schedule</a> » edit-schedule
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
                        echo form_open('schedule/update',$attributes) ?>
                        <h1>Edit Schedule
                            
                        </h1>
                        <label>
                            <input type='hidden' name="id" value="<?php echo $schedule['sc_id'];?>"/>
                        </label> 
                        <label>
                            <span>Gelombang :</span>
                            <select name="gelombang">
                                <?php
                                for($i=1; $i<=3; $i++){
                                    if($schedule['sc_gelombang'] == $i){
                                        echo "<option selected>$i</option>";
                                    }
                                    else{
                                        echo "<option>$i</option>";
                                    }
                                        
                                }
                                ?>
                                
                            </select>
                            <!--<input id='name' type='text' name='name' placeholder='Your Full Name' />-->
                        </label>
                            
                        <?php
                            $tanggal = date('m/d/y', strtotime($schedule['sc_date']));
                        ?>
                          <!--http://jquerytools.org/documentation/dateinput/-->                        
                        <label>
                            <span>Tanggal Test :</span>
                            <input type='date' name="tanggal" value="<?php echo $tanggal;?>"/>
                        </label>                  
                        
                        <!--http://runnable.com/UgCgGBRfEwILAAEt/how-to-create-date-time-picker-using-jquery-ui-->
                        <label>
                            <span>Jam Mulai :</span>
                            <input type='text' class='time' name='time1' value="<?php echo $schedule['sc_starttime'];?>"/>
                        </label> 
                        <label>
                            <span>Jam Selesai :</span>
                            <input type='text'  class='time' name='time2' value="<?php echo $schedule['sc_endtime'];?>"/>
                        </label> 

                        <label>
                            <span>Tempat Test :</span>
                            <input type='text' name="tempat" value="<?php echo $schedule['sc_place'];?>"/>
                        </label> 
                        <label>
                            <span>Alamat :</span>
                            <textarea id='alamat' name='alamat' placeholder='Test Address' value="<?php echo $schedule['sc_address'];?>"></textarea>
                        </label>
                        <label>
                            <span>Kota :</span>
                            <input type='text' name="kota" value="<?php echo $schedule['sc_city'];?>"/>
                        </label> 
                       
                        <label>
                            <span>Kapasitas :</span>
                            <input type='text' name="kapasitas" value="<?php echo $schedule['sc_capacity'];?>"/>
                        </label>
                        
                        <?php
                            $tanggal_dok = date('m/d/y', strtotime($schedule['sc_doc_deadline']));
                        ?>
                        <label>
                            <span>Penyerahan Dokumen :</span>
                            <input type='date' name="dokumen" value="<?php echo $tanggal_dok;?>"/>
                        </label>
                        
                        <?php
                            $tanggal_konfirmasi = date('m/d/y', strtotime($schedule['sc_pay_deadline']));
                        ?>
                        <label>
                            <span>Konfirmasi USM :</span>
                            <input type='date' name="konfirmasi" value="<?php echo $tanggal_konfirmasi;?>"/>
                        </label>
                        
                         <label>
                            <span>Status :</span>
                            <select name="status">
                                <?php
                                    if($schedule['sc_status']){
                                        echo "<option selected value=1>Open</option>";
                                        echo "<option value=0>Closed</option>";
                                    }
                                    else{                                        
                                        echo "<option value=1>Open</option>";
                                        echo "<option selected value=0>Closed</option>";
                                    
                                    }
                                ?>
                             
                            </select>
                            
                        </label>
                        
                         <label>
                            <span>&nbsp;</span>
                            <button type='submit' name='updateForm' class='button' value='updateButton' >Update</button>   
                            <button type='submit' name='updateForm' class='button' value='cancelButton' >Cancel</button>   
                            
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
