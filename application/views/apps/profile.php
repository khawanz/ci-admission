<link rel='stylesheet' media='all' type='text/css' href='http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css' />
<link rel='stylesheet' media='all' type='text/css' href='<?php echo base_url(); ?>/assets/css/jquery-ui-timepicker-addon.css' />
<div id='breadcrumb'>
    <a href='#'>users</a> » profile
</div>     
<!--<div class='menu-div'>
    <a href='<?php echo base_url(); ?>schedule'><div class='menu-list'>List</div></a>
    <a href='#'><div class='menu-list'>Add</div></a>
</div>-->

<div id='container'>           
                  
            <div id='content-container'>

                    <div id='content'>
                        <?php echo validation_errors();?>
                        
                        <?php 
                        $attributes = array('class' => 'basic-grey');
                        echo form_open('schedule/create',$attributes) ?>
                        <h1>Account
                            <!--<span>Please fill all the texts in the fields.</span>-->
                        </h1>
                        <label>
                            Username : Hadik                          
                        </label><br/>
                         <label>
                            Email : Hadi@yahoo.com                            
                        </label><br/>
                        <label>
                            Status : Aktif                            
                        </label><br/>
                        
                                               
                        <?php echo form_close(); ?>
                            
                        <div id="tabmenu">
                            <ul>
                                <li id="nav-personal"><a href="#">Data Pribadi</a></li>
                                <li id="nav-parent" class="onlink"><a href="#"  class="onlink">Data Orangtua</a></li>
                                <li id="nav-school"><a href="#">Data Sekolah</a></li>
                                <li id="nav-mark"><a href="#">Nilai</a></li>
                                <li id="nav-others"><a href="#">Lain-lain</a></li>
                            </ul>
                       </div><br/>
                        <div id="profile-content">
                            
                    </div>
                   
            </div>
        </div>
    
		
    <script type="text/javascript">
        
    </script>